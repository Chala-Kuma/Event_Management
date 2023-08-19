<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use App\Http\Requests\SponsorRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateSponsorRequest;
use Symfony\Component\HttpFoundation\Response;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Sponsor::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SponsorRequest $request)
    {
        //
        $request->validated();
        return auth()->user()->sponsor()->create([
            "name"=>$request->name,
            "email"=>$request->email,
            "logo"=> $request->file('logo')->store("sponsor logo","public")
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponsor $sponsor)
    {
        //
        return $sponsor;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSponsorRequest $request, Sponsor $sponsor)
    {
        //
        $request->validated();
        if($request->hasFile('logo')){
            Storage::disk("public")->delete($sponsor->logo);
            $sponsor->update([
                "name"=>$request->name?$request->name:$sponsor->name,
                "email" =>$request->email?$request->email:$sponsor->email,
                "logo" => $request->file('logo')->store("sponsor_logo","public")
            ]);
        }
        else{
            $sponsor->update($request->all());
        }


        return $sponsor;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponsor $sponsor)
    {
        //
        $sponsor->delete();
        return response("",Response::HTTP_NO_CONTENT);

    }
}
