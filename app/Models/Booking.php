<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking_requests';

    protected $fillable = [
        'looking_to_do',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'postal_code',
        'state_province',
        'contact_method',
        'arrival_date',
        'departure_date',
        'flexible_dates',
        'guests',
        'airport_pickup',
        'rooms',
        'room_type',
        'accommodation_preferences',
        'rounds',
        'courses',
        'golf_time',
        'tee_time_preferences',
        'hear_about_us',
        'special_occasion',
        'consent',
    ];

    protected $casts = [
        'flexible_dates' => 'boolean',
        'courses' => 'array',  
    ];
}
