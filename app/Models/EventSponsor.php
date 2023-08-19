<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventSponsor extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "event_id",
        "sponsor_id"
    ];


}
