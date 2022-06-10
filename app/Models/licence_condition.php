<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class licence_condition extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "licence_condition";
    protected $fillable = [
        'condition',
    ];
    static function rules(): array{
        return[
            'condition' =>'required|string|unique:licence_condition, condition',
        ];
    }
}
