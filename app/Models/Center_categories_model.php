<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center_categories_model extends Model
{
    use HasFactory;
    protected $table = 'center_categories';
    protected $fillable = [
        'center_cat',
        'status',
        'slug'
    ];
    function markers()
    {
        return $this->hasMany(Markers_model::class, 'center_categories', 'id')->where('status', 1);
    }
}
