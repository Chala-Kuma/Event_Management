<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "descripton",
        "start_date",
        "end_date",
        "registration_start_date",
        "registration_end_date",
        "location",
        "hall",
        "event_type",
        "event_status",
        "available_tickets"
    ];

}
