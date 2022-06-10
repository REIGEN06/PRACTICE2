<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class field extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "field";
    protected $fillable = [
        'name',
        'degree_of_development',
        'polygon',
        'licence_area_id',
        'subject_rf_id',
    ];
}
