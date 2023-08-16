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
        "available_seat"
    ];

    // event has many attendee relationship (one to many relation ship)
    public function eventAttendee(){
        return $this->hasMany(EventAttendee::class);
    }

    // event has manu Feedback relationship (one to many relation ship)
    public function eventFeedback(){
        return $this->hasMany(EventFeedback::class);
    }

    // event has many File relation ship (one to many relation ship)
    public function eventFile(){
        return $this->hasMany(EventFile::class);
    }


    public function speaker(){
        return $this->belongsToMany(Speaker::class,"event_speakers");
    }

    public function sponsor(){
        return $this->belongsToMany(Sponsor::class,"event_sponsors");
    }

    //relationship with user model (one to many relationship)
    public function user(){
        return $this->belongsTo(User::class);
    }
}
