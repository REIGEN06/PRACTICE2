<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject_rf extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "subject_rf";
    protected $fillable = [
        'name',
        'shortname',
        'federal_district_id',
    ];
    static function rules(): array{
        return[
            'name' =>'required|string|unique:subject_rf,name',
        ];
    }
}
