<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
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
        'location',
        'slug',
    ];
}
