<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponser extends Model
{
    use HasFactory;
    protected $table = 'sponsership';
    protected $fillable = [
        'title',
        'image',
      
        'status',
 
    ];
}
