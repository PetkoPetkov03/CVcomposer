<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $table = "people";

    protected $fillable = [
        "first_name",
        "middle_name",
        "last_name",
        "date_of_birth"
    ];

    function cv() {
        return $this->hasOne(CV::class);
    }
}
