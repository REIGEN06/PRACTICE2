<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_of_main_mineral extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "type_of_main_mineral";
    protected $fillable = [
        'name',
    ];
    static function rules(): array{
        return[
            'name' =>'required|string|unique:type_of_main_mineral, name',
        ];
    }
}
