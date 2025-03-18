<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages_categories extends Model
{
    use HasFactory;
    protected $table = 'packages_categories';
    protected $fillable = [
        'name',
        'status',
        'slug'
    ];
    function packages_posts(){
        return $this->hasMany(Packages_model::class,'category','id')->where('status',1);
    }
    
}
