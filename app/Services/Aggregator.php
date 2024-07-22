<?php
namespace App\Services;

use App\Models\Person;
use DateTime;

class Aggregator
{
    private array $aggregated_data;

    public function __construct()
    {
        $this->aggregated_data = [];
    }

    public function agregate()
    {
        $current_year = (int) date('Y');
        $birth_date_range = Person::selectRaw('MIN(date_of_birth) as min_birth_date, MAX(date_of_birth) as max_birth_date')->first();

        if (!$birth_date_range) {
            return [];
        }

        $min_birth_date = new DateTime($birth_date_range->min_birth_date);
        $max_birth_date = new DateTime($birth_date_range->max_birth_date);
        $max_age = $current_year - $min_birth_date->format('Y');
        $min_age = $current_year - $max_birth_date->format('Y');

        $interval = 10;
        $gap = 1;

        $age_ranges = [];

        $start_age = $min_age;

        while ($start_age <= $max_age) {
            $end_age = min($start_age + $interval - 1, $max_age);
            array_push($age_ranges, [
                'min' => $start_age,
                'max' => $end_age,
            ]);
            $start_age = $end_age + $gap;
        }

        foreach ($age_ranges as $range) {
            $min_birth_year = $current_year - $range['max'];
            $max_birth_year = $current_year - $range['min'];

            $birth_date_min = new DateTime("$min_birth_year-01-01");
            $birth_date_max = new DateTime("$max_birth_year-12-31");

            $people = Person::whereBetween('date_of_birth', [$birth_date_min->format('Y-m-d'), $birth_date_max->format('Y-m-d')])->get();

            if ($people->isEmpty()) {
                continue;
            }

            $tech_obj = [];
            $date_of_applications = [];

            foreach ($people as $person) {
                $cv = $person->cv;
                if ($cv) {
                    $techs = $cv->technologies->pluck('tech_name')->toArray();
                    $tech_obj = array_merge($tech_obj, $techs);
                    array_push($date_of_applications, $cv->created_at);
                }
            }

            $tech_obj = array_unique($tech_obj);
            $min_date_of_application = min($date_of_applications);
            $max_date_of_application = max($date_of_applications);

            array_push($this->aggregated_data, [
                'age' => "{$range['min']}-{$range['max']}",
                'technologies' => $tech_obj,
                'date_of_application' => [
                    'min' => $min_date_of_application,
                    'max' => $max_date_of_application,
                ],
            ]);
        }

        return view("agregate", ["data" => $this->aggregated_data]);
    }

    public function getAggregatedData()
    {
        return $this->aggregated_data;
    }
}
