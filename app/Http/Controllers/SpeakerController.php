<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use App\Http\Requests\SpeakerRequest;
use App\Http\Requests\UpdateSpeakerRequest;
use Symfony\Component\HttpFoundation\Response;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Speaker::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpeakerRequest $request)
    {
        //
        return auth()->user()->speaker()->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Speaker $speaker)
    {
        //
        return $speaker;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpeakerRequest $request, Speaker $speaker)
    {
        //
        $speaker->update($request->validated());
        return $speaker;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Speaker $speaker)
    {
        //
        $speaker->delete();
        return response("",Response::HTTP_NO_CONTENT);
    }
}
