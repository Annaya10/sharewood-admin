<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventBooking extends Model
{
    use HasFactory;

    protected $table = 'event_bookings';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'company',
        'event_type',
        'date_time',
        'players',
        'package',
        'services',
        'status',
    ];
}
