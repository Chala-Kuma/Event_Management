<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateEventRequest;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return EventResource::collection(Event::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        //
        $request->validated();
        $event = auth()->user()->event()->create(
            [
                ...$request->all(),
                "banner" => $request->file('banner')->store("event banner","public")
            ]
        );
        return new EventResource($event);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
        return new EventResource($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
        $request->validated();
        if($request->hasFile('banner')){
            Storage::disk("public")->delete($event->banner);
            $event->update(
                [
                    ...$request->all(),
                    "banner" => $request->file('banner')->store("event banner","public")
                ]
            );
        }
        else{
            $event->update();
        }
        return new EventResource($event);
    }

    public function report(Event $event){
        return [
            "title" => $event->title,
            "title" => $event->title,
            "descripton" => $event->descripton,
            "start_date" => $event->start_date,
            "end_date" => $event->end_date,
            "location" => $event->location,
            "hall" => $event->hall,
            "event_type" => $event->event_type,
            "event_status" => $event->event_status,
            "banner" => $event->banner,
            "speakers" => $event->speaker,
            "sponsors" => $event->sponsor,
            "feedback" => $event->eventFeedback,
            "The number of  attendees" => count($event->eventAttendee),
            "The number of present attendees" => count($event->eventAttendee->where("is_present", 1)),
            "The number of absent attendees" => count($event->eventAttendee->where("is_present", 0))
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
        Storage::disk("public")->delete($event->banner);
        $event->delete();
        return response("",Response::HTTP_NO_CONTENT);
    }
}
