<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventAttendeeRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventAttendee;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EventAttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
        //
        return $event->eventAttendee;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventAttendeeRequest $request,Event $event)
    {
        //
        return $event->eventAttendee()->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event, EventAttendee $attendee)
    {
        //
        foreach ($event->eventAttendee as $oneattendee){
            if ($oneattendee->id == $attendee->id){
                return $oneattendee;
            }
        }
        return response(["message"=>"Attendee not found"],Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function approveAttendee(Request $request, EventAttendee $attendee)
    {
        $request->validate([
            "is_approved" => ["required","boolean"]
        ]);

        $attendee->update([
            "user_id" => Auth::user()->id,
            "is_approved" => $request->is_approved
        ]);
        return $attendee;
    }

    public function attendance(Request $request, EventAttendee $attendee){
        $request->validate([
            "is_present" => ["required","boolean"]
        ]);

        $attendee->update([
            "is_present" => $request->is_present
        ]);

        return $attendee;

    }
}
