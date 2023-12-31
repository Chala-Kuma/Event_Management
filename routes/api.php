<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\EventAttendeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventDocumentController;
use App\Http\Controllers\EventFeedbackController;
use App\Http\Controllers\EventImageController;
use App\Http\Controllers\EventSpeakerController;
use App\Http\Controllers\EventSponsorController;
use App\Http\Controllers\EventVideoController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\SponsorController;
use App\Models\EventDocument;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware("auth:sanctum")->group(function(){
    Route::post("auth/register",[AuthController::class, "register"]);
    Route::post("auth/logout", [AuthController::class,"logout"])->name("logout");
    Route::apiResource("event",EventController::class,["except"=>["index","show"]]);
    Route::apiResource("speaker",SpeakerController::class,["except"=>["show"]]);
    Route::apiResource("sponsor",SponsorController::class,["except"=>["show"]]);
    Route::get("event/{event}/report",[EventController::class,"report"])->name("event.report");
    Route::apiResource("event/{event}/speaker",EventSpeakerController::class,["except"=>["index","show"]]);
    Route::apiResource("event/{event}/sponsor",EventSponsorController::class,["except"=>["index","show"]]);
    Route::apiResource("event/{event}/feedback",EventFeedbackController::class,["only"=>["index","show"]]);
    Route::apiResource("event/{event}/attendee",EventAttendeeController::class,["only"=>["index","show"]]);
    Route::apiResource("event/{event}/document",EventDocumentController::class,["except" => ["index","show","destroy"]]);
    Route::apiResource("event/{event}/image",EventImageController::class,["except" => ["index","show","destroy"]]);
    Route::apiResource("event/{event}/video",EventVideoController::class,["except" => ["index","show","destroy"]]);
    Route::delete("document/{document}",[EventDocumentController::class,"destroy"])->name("document.destroy");
    Route::delete("image/{image}",[EventImageController::class,"destroy"])->name("image.destroy");
    Route::delete("video/{video}",[EventVideoController::class,"destroy"])->name("video.destroy");
    Route::put("attendee/{attendee}",[EventAttendeeController::class,"approveAttendee"])->name("attendee.approve");
    Route::put("attendee/{attendee}/attendance",[EventAttendeeController::class,"attendance"])->name("attendee.attendance");
});
Route::apiResource("event",EventController::class,["only"=>["index","show"]]);
Route::apiResource("event/{event}/speaker",EventSpeakerController::class,["only"=>["index","show"]]);
Route::apiResource("event/{event}/sponsor",EventSponsorController::class,["only"=>["index","show"]]);
Route::apiResource("event/{event}/attendee",EventAttendeeController::class,["only"=>["store"]]);
Route::apiResource("event/{event}/document",EventDocumentController::class,["only" => ["index","show"]]);
Route::apiResource("event/{event}/image",EventImageController::class,["only" => ["index","show"]]);
Route::apiResource("event/{event}/video",EventVideoController::class,["only" => ["index","show"]]);
Route::post("event/{event}/feedback/{attendee}",[EventFeedbackController::class,"store"])->name("attendee.feedback");
Route::apiResource("speaker",SpeakerController::class,["only"=>["show"]]);
Route::apiResource("sponsor",SponsorController::class,["only"=>["show"]]);
Route::post("auth/login",[AuthController::class, "login"]);
