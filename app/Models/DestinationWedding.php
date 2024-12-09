<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationWedding extends Model
{
    use HasFactory;

    // Define the fields that are fillable
    protected $fillable = [
        'role', 'bride_name', 'groom_name', 'address', 'phone', 'email',
        'event_date', 'season', 'guest_count', 'destinations', 'referral',
        'specialist', 'additional_details', 'heard_about'
    ];
}
