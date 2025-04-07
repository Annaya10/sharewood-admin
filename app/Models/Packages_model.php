<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages_model extends Model
{
    use HasFactory;

    protected $table = 'packages';
    protected $fillable = [
        'title',
        'category',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'short_detail',
        'fee_duration',

        'detail',
        'duration',
        'image',
        'status',
        'featured',
        'type',
        'slug',
    ];

    public function category()
    {
        return $this->belongsTo(Packages_categories::class, 'category', 'id');
    }
}
