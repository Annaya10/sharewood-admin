<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levels_model extends Model
{
    use HasFactory;
    protected $table = 'levels';
    protected $fillable = [
        'name',
        'price',
        'game_id',
       

        'meta_title',
        'meta_description',
        'meta_keywords',


        'mem_status',
        'slug',
    ];


    public function game()
    {
        return $this->belongsTo(Games_model::class);
    }
}
