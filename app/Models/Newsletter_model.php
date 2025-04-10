<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter_model extends Model
{
    use HasFactory;
    protected $table = 'newsletter';
    protected $fillable = [
        'email',
        'status',
    ];
}
