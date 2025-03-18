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
        'blog_date',
        's_time',
        'e_time',

        'detail',
        'image',
        'status',
        'featured',
        'popular',
        'slug',
    ];

    public function category()
    {
        return $this->belongsTo(Packages_categories::class, 'category', 'id');
    }
}
