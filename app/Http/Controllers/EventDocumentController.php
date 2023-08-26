<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventDocument;
use Illuminate\Support\Facades\Storage;
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
    public function show(Event $event,EventDocument $document)
    {
        //
        foreach ($event->eventDocument as $onedocument){
            if ($onedocument->id == $document->id){
                return $onedocument;
            }
        }
        return response(["message"=>"document not found"],Response::HTTP_NOT_FOUND);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event, EventDocument $document)
    {
        //
        $request->validate([
            "doc_url" => ["required","file"]
        ]);

        Storage::disk("public")->delete($document->doc_url);
        $document->update([
            "doc_url" => $request->file('doc_url')->store("event document","public"),
            "event_id" => $event->id
        ]);

        return $document;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventDocument $document)
    {
        //
        Storage::disk("public")->delete($document->doc_url);
        $document->delete();
        return response([],Response::HTTP_NO_CONTENT);
    }
}
