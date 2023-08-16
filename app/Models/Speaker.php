<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "phone",
        "bio"
    ];

    public function event(){
        return $this->belongsToMany(Event::class,"event_speakers");
    }

    /// Speaker belongs to the event (one to many relationship)
    public function user(){
        return $this->belongsTo(User::class);
    }
}
