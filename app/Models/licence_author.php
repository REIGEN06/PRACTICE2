<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class licence_author extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "licence_author";
    protected $fillable = [
        'name',
    ];
    static function rules(): array{
        return[
            'name' =>'required|string|unique:licence_author, name',
        ];
    }
}
