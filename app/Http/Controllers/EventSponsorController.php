<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Sponsor;
use App\Models\EventSponsor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventSponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
        //
        return $event->sponsor->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
    {
        //
        $request->validate([
            "sponsor_id" => ["required","integer"]
        ]);

        return EventSponsor::create([
            "event_id" => $event->id,
            "sponsor_id" => $request->sponsor_id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event, Sponsor $sponsor)
    {
        //
        foreach ($event->speaker as $onesponsor){
            if ($onesponsor->id == $sponsor->id){
                return $onesponsor;
            }
        }
        return response(["message"=>"sponsor not found"],Response::HTTP_NOT_FOUND);
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
    public function destroy(Event $event, Sponsor $sponsor)
    {
        //
        EventSponsor::where("event_id",$event->id)->where("sponsor_id", $sponsor->id)->delete();
        return response([],Response::HTTP_NO_CONTENT);
    }
}
