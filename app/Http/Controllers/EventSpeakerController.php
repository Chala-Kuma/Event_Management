<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Speaker;
use App\Models\EventSpeaker;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventSpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
        //
        return $event->speaker->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Event $event)
    {
        //
        $request->validate([
            "speaker_id" => ["required","integer"]
        ]);

        $speaker =Speaker::find($request->speaker_id);

        if ($speaker){
            return EventSpeaker::create([
                "event_id" => $event->id,
                "speaker_id" => $request->speaker_id
            ]);
        }

        return response(["message"=>"Speaker not found"],Response::HTTP_NOT_FOUND);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event,Speaker $speaker)
    {
        //
        foreach ($event->speaker as $onespeaker){
            if ($onespeaker->id == $speaker->id){
                return $onespeaker;
            }
        }
        return response(["message"=>"speaker not found"],Response::HTTP_NOT_FOUND);
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
    public function destroy(Event $event, Speaker $speaker)
    {
        //
        EventSpeaker::where("event_id",$event->id)->where("speaker_id", $speaker->id)->delete();
        return response([],Response::HTTP_NO_CONTENT);
    }
}
