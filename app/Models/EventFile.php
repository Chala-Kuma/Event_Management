<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFile extends Model
{
    use HasFactory;

    protected $fillable = [
        "event_id",
        "image_url",
        "vedio_url",
        "doc_url"
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
