<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventVideo extends Model
{
    use HasFactory;


    protected $fillable = [
        "user_id",
        "event_id",
        "video_url"
    ];


    /// event attendee belongs to the event (one to many relationship)
    public function event(){
        return $this->belongsTo(Event::class);
    }

    /// event attendee belongs to the event (one to many relationship)
    public function user(){
        return $this->belongsTo(User::class);
    }
}
