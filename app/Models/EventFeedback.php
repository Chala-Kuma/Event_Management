<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventFeedback extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "event_id",
        "event_attendee_id",
        "event_feedback"
    ];

    /// event attendee belongs to the event (one to many relationship)
    public function event(){
        return $this->belongsTo(Event::class);
    }
}
