<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_model extends Model
{
    use HasFactory;

    protected $table = 'members';


    protected $fillable = [
        'mem_fullname',
        'mem_email',
        'mem_password',
       

        'otp',
        'otp_expire',
        'mem_image',


        'status',
        'mem_username',
    ];


}
