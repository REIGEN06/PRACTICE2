<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class licence_area extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "licence_area";
    protected $fillable = [
        'name',
 ];
}
