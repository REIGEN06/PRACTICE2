<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class field_licence_area extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "field_licence_area";
    protected $fillable = [
        'field_id',
        'licence_area_id',
    ];
}
