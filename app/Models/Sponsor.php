<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "logo"
    ];

    public function event(){
        return $this->belongsToMany(Event::class,"event_sponsors");
    }

     /// Sponsor belongs to the event (one to many relationship)
     public function user(){
        return $this->belongsTo(User::class);
    }
}
