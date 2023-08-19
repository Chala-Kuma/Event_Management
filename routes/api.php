<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SpeakerController;

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
});
Route::apiResource("event",EventController::class,["only"=>["index","show"]]);
Route::apiResource("speaker",SpeakerController::class,["only"=>["show"]]);
Route::post("auth/register",[AuthController::class, "register"]);
Route::post("auth/login",[AuthController::class, "login"]);
