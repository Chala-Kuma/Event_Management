<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventVideo;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
        //
        return $event->eventVideo->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
    {
        //
        $request->validate([
            "video_url" => ["required","active_url"]
        ]);

        return auth()->user()->eventVideo()->create([
            "video_url" => $request->video_url,
            "event_id" => $event->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event, EventVideo $video)
    {
        //
        foreach ($event->eventVideo as $oneVideo){
            if ($oneVideo->id == $video->id){
                return $oneVideo;
            }
        }
        return response(["message"=>"video not found"],Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, event $event, EventVideo $video)
    {
        //
        $request->validate([
            "video_url" => ["required","active_url"]
        ]);

        $video->update([
            "video_url" => $request->video_url,
            "event_id" => $event->id
        ]);

        return $video;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventVideo $video)
    {
        //
        $video->delete();
        return response([],Response::HTTP_NO_CONTENT);
    }
}
