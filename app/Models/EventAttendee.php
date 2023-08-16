<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAttendee extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "phone",
        "is_present",
        "event_id"
    ];

    /// event attendee belongs to the event (one to many relationship)
    public function event(){
        return $this->belongsTo(Event::class);
    }
    /// user attendee belongs to the event (one to many relationship)
    public function user(){
        return $this->belongsTo(User::class);
    }
}
