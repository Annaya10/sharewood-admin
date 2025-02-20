<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Markers_model extends Model
{
    use HasFactory;
    protected $table = 'markers';
    protected $fillable = [
        'name',
        // 'region',
        'top',
        'left',

        'city_name',
        'office_name',
        'category',
        'status',
        // 'slug',
    ];
}
