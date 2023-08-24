<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventFile extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "event_id",
        "image_url",
        "vedio_url",
        "doc_url"
    ];

    protected $casts = [
        "image_url" => "array",
        "vedio_url" => "array",
        "doc_url" => "array"
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
