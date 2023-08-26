<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class EventImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
        //
        return $event->eventImage->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Event $event)
    {
        //
        $request->validate([
            "image_url" => ["required","image"]
        ]);

        return auth()->user()->eventImage()->create([
            "image_url" => $request->file('image_url')->store("event image", "public"),
            "event_id" => $event->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event, EventImage $image)
    {
        //
        foreach ($event->eventImage as $oneImage){
            if ($oneImage->id == $image->id){
                return $oneImage;
            }
        }
        return response(["message"=>"image not found"],Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event, EventImage $image)
    {
        //
        $request->validate([
            "image_url" => ["required","image"]
        ]);

        Storage::disk("public")->delete($image->image_url);
        $image->update([
            "image_url" => $request->file('image_url')->store("event image", "public"),
            "event_id" => $event->id
        ]);

        return $image;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventImage $image)
    {
        //
        Storage::disk("public")->delete($image->image_url);
        $image->delete();
        return response([],Response::HTTP_NO_CONTENT);
    }
}
