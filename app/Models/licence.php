<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class licence extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "licence";
    protected $fillable = [
        'series',
        'number',
        'view',
        'date_of_receiving',
        'date_of_expiration',
        'date_of_annulment',
        'polygon',
        'previous_licence',
        'subsoil_user_id',
        'licence_area_id',
        'type_of_main_mineral_id',
        'licence_condition_id',
        'licence_status_id',
        'licence_author_id',
    ];
}
