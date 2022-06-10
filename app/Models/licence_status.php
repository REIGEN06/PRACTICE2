<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class licence_status extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "licence_status";
    protected $fillable = [
        'status',
    ];
    static function rules(): array{
        return[
            'status' =>'required|string|unique:licence_status, status',
        ];
    }
}
