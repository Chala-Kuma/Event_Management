<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventAttendeeRequest extends FormRequest
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
            //
            "name" => ["required","string"],
            "email" => ["required","email","unique:event_attendees,email"],
            "phone" => ["required","string","unique:event_attendees,phone"],
            "is_present" => ["boolean"],
            "is_approved" => ["boolean"],
        ];
    }
}
