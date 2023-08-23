<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "title" => ["string"],
            "user_id"=>[],
            "descripton" => ["string"],
            "start_date" => ["date","after:tomorrow"],
            "end_date" => ["date","after:tomorrow"],
            "registration_start_date" => ["date","before:yesterday"],
            "registration_end_date" => ["date","before:yesterday"],
            "location" => ["string"],
            "hall" => ["string"],
            "event_type" => ["boolean"],
            "event_status" => ["string"],
            "available_seat" => ["integer"],
            "banner" => ["image"]
        ];
    }
}
