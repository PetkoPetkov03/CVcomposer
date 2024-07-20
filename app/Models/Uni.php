<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uni extends Model
{
    use HasFactory;

    protected $table = "unis";

    protected $fillable = [
        'uni_name', 'grade'
    ];

    public function cvs()
    {
        return $this->hasMany(Cv::class);
    }
}
