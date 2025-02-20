<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games_model extends Model
{
    use HasFactory;
    protected $table = 'games';
    protected $fillable = [
        'title',
        'detail',
        'image',
        'heading_1',
        'block_1',
        'heading_2',
        'block_2',

        'meta_title',
        'meta_description',
        'meta_keywords',


        'status',
        'slug',
    ];


    public function levels()
    {
        return $this->hasMany(Levels_model::class);
    }
}
