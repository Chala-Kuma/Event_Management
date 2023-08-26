<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventDocument;
use Symfony\Component\HttpFoundation\Response;

class EventDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Event $event)
    {
        //
        return $event->eventDocument->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Event $event)
    {
        //
        $request->validate([
            "doc_url" => ["required","file"]
        ]);
        return auth()->user()->eventDocument()->create([
            "doc_url" => $request->file('doc_url')->store("event document","public"),
            "event_id" => $event->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event,EventDocument $eventDocument)
    {
        //
        foreach ($event->eventDocument as $document){
            if ($document->id == $eventDocument->id){
                return $document;
            }
        }
        return response(["message"=>"document not found"],Response::HTTP_NOT_FOUND);
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
    public function destroy(EventDocument $eventDocument)
    {
        //
        $eventDocument->delete();
        return response([],Response::HTTP_NO_CONTENT);
    }
}
