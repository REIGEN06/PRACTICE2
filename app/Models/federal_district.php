<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class federal_district extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "federal_district";
    protected $fillable = [
        'name',
    ];
    static function rules(): array{
        return[
            'name' =>'required|string|unique:federal_district,name',
        ];
    }
    
}
