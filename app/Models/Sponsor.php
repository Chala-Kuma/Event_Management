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
}
