<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "descripton" => $this->descripton,
            "start_date" => $this->start_date,
            "end_date" => $this->end_date,
            "registration_start_date" => $this->registration_start_date,
            "registration_end_date" => $this->registration_end_date,
            "location" => $this->location,
            "hall" => $this->hall,
            "event_type" => $this->event_type,
            "event_status" => $this->event_status,
            "available_seat" => $this->available_seat,
            "speakers" => $this->speaker,
            "sponsors" => $this->sponsor
        ];
    }
}
