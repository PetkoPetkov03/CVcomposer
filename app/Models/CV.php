<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;

    protected $table = "c_v_s";
    protected $fillable = [
        'date_of_birth', 
        'university_id',
        "person_id"
    ];

    public function university()
    {
        return $this->belongsTo(Uni::class);
    }

    public function person() {
        return $this->belongsTo(Person::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Tech::class, 'cv_technology');
    }
}
