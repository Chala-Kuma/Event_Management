<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        "event_id",
        "event_attendee_id",
        "event_feedback"
    ];
}
