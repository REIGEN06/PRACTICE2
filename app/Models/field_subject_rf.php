<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class field_subject_rf extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "field_subject_rf";
    protected $fillable = [
        'field_id',
        'subject_rf_id',
    ];
}
