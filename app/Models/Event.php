<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory,SoftDeletes;

    public const OPEN = 1;
    public const CLOSED = 0;

    public const UP_COMING = "up coming";
    public const ON_GOING = "on going";
    public const PASSED = "passed";
    protected $fillable = [
        "title",
        "user_id",
        "descripton",
        "start_date",
        "end_date",
        "registration_start_date",
        "registration_end_date",
        "location",
        "hall",
        "event_type",
        "event_status",
        "available_seat",
        "banner"
    ];

    protected $guarded = false;
    // event has many attendee relationship (one to many relation ship)
    public function eventAttendee(){
        return $this->hasMany(EventAttendee::class);
    }

    // event has manu Feedback relationship (one to many relation ship)
    public function eventFeedback(){
        return $this->hasMany(EventFeedback::class);
    }

    // user has many File relation ship (one to many relation ship)
    public function eventImage(){
        return $this->hasMany(EventImage::class);
    }

    // user has many File relation ship (one to many relation ship)
    public function eventDocument(){
        return $this->hasMany(EventDocument::class);
    }


    // user has many File relation ship (one to many relation ship)
    public function eventVideo(){
        return $this->hasMany(EventVideo::class);
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
