<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventSpeakerController;
use App\Http\Controllers\EventSponsorController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\SponsorController;

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
    Route::apiResource("event",EventController::class,["except"=>["index","show"]]);
    Route::apiResource("speaker",SpeakerController::class,["except"=>["show"]]);
    Route::apiResource("sponsor",SponsorController::class,["except"=>["show"]]);
    Route::apiResource("event/{event}/speaker",EventSpeakerController::class,["except"=>["index","show"]]);
    Route::apiResource("event/{event}/sponsor",EventSponsorController::class,["except"=>["index","show"]]);

});
Route::apiResource("event",EventController::class,["only"=>["index","show"]]);
Route::apiResource("event/{event}/speaker",EventSpeakerController::class,["only"=>["index","show"]]);
Route::apiResource("event/{event}/sponsor",EventSponsorController::class,["only"=>["index","show"]]);
Route::apiResource("speaker",SpeakerController::class,["only"=>["show"]]);
Route::apiResource("sponsor",SponsorController::class,["only"=>["show"]]);
Route::post("auth/register",[AuthController::class, "register"]);
Route::post("auth/login",[AuthController::class, "login"]);
