<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Models\Person;
use App\Models\Tech;
use App\Models\Uni;
use App\Services\Aggregator;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;

class CVController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'Hello';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $universities = Uni::all();
        $tech = Tech::all();

        return view('index', ['universities' => $universities, 'tech' => $tech]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'uni' => 'required',
            'tech' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['msg' => $validator->errors()->toArray()]);
        }

        try {
            $person = Person::where('first_name', $request->first_name)
                ->where('middle_name', $request->middle_name)
                ->where('last_name', $request->last_name)
                ->where('date_of_birth', $request->date_of_birth)
                ->first();

            if ($person) {
                return redirect()->route('cv.show', ['person' => $person, 'cv' => $person->cv]);
            }

            $person = Person::create([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'date_of_birth' => $request->date_of_birth,
            ]);

            $uni = Uni::findOrFail($request->uni);

            $cv = CV::create([
                'university_id' => $uni->id,
                'person_id' => $person->id,
            ]);

            $cv->technologies()->attach($request->tech);
            return redirect()->route('done');
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }

        // return dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person, CV $cv)
    {
        return view('CV', ['cv' => $cv, 'person' => $person]);
    }

    public function showByDate(Request $request)
    {
        $people = Person::whereBetween('date_of_birth', [$request->from, $request->to])->get();

        return view('CVchoose', ['people' => $people]);
    }

    public function agregate(Request $request)
    {
        $agregator = new Aggregator();

        $agregator->agregate();

        return view('agregate', ['data' => $agregator->getAggregatedData()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CV $cV)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CV $cV)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CV $cV)
    {
        //
    }
}
