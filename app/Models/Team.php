<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'team';
    protected $fillable = [
        'title',
        
        'meta_title',
        'meta_description',
        'meta_keywords',
        

        'detail',
        'image',
        'status',
        'featured',
        'slug',
        'content',
    ];
}
