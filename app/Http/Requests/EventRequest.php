<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            "title" => ["required","string"],
            "user_id"=>["sometimes"],
            "descripton" => ["required","string"],
            "start_date" => ["required","date","after:tomorrow"],
            "end_date" => ["required","date","after:tomorrow"],
            "registration_start_date" => ["required","date","before:yesterday"],
            "registration_end_date" => ["required","date","before:yesterday"],
            "location" => ["required","string"],
            "hall" => ["required","string"],
            "event_type" => ["sometimes","boolean"],
            "event_status" => ["sometimes","string"],
            "available_seat" => ["required","integer"]
        ];
    }
}
