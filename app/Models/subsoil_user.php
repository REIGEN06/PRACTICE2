<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subsoil_user extends Model
{
    use HasFactory;
    // public $timestamps = false;
    protected $table = "subsoil_user";
    protected $fillable = [
           'name',
           'address', 
           'INN',
           'OKPO' ,
           'OKATO' ,
           'OGRN' ,
           'notes' ,
           'status' ,
           'ManagementCo' ,
           'count_licences',
           'count_valid_licences',
    ];
}
