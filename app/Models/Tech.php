<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tech extends Model
{
    use HasFactory;

    protected $table = "techs";

    protected $fillable = [
        'tech_name'
    ];
    
    public function cvs()
    {
        return $this->belongsToMany(Cv::class, 'cv_technology');
    }
}
