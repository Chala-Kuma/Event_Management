<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventAttendee;
use App\Models\EventFeedback;
use Symfony\Component\HttpFoundation\Response;

class EventFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
        //
        return $event->eventFeedback;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Event $event, EventAttendee $attendee)
    {
        //
        $request->validate([
            "event_feedback" => ["required","string"]
        ]);

        return $event->eventFeedback()->create([
            "event_feedback" => $request->event_feedback,
            "event_attendee_id" => $attendee->id
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event, EventFeedback $feedback)
    {
        //
        foreach ($event->eventFeedback as $onefeedback){
            if ($onefeedback->id == $feedback->id){
                return $onefeedback;
            }
        }
        return response(["message"=>"Feedback not found"],Response::HTTP_NOT_FOUND);
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
}
