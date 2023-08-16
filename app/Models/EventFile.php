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
}
