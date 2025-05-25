<?php

use App\Http\Controllers\Api\AttendeeController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('events', EventController::class);
    Route::apiResource('events.attendees', AttendeeController::class)
        ->scoped()->except(['update']);
});

//Route::apiResource('events', EventController::class);
//Route::apiResource('events.attendees', AttendeeController::class)
//    ->scoped()->except(['update']);

// GET|HEAD api/event  =>  event.index
// POST api/event  =>  event.store
// GET|HEAD api/event/{event}  =>  event.show
// PUT|PATCH api/event/{event}  =>  event.update
// DELETE api/event/{event}  =>  event.delete
// GET|HEAD api/event/{event}/attendees  =>  event.attendee.index
// POST api/event/{event}/attendees  =>  event.attendee.store
// GET|HEAD api/event/{event}/attendees/{attendee}  =>  event.attendee.show
// PUT|PATCH api/event/{event}/attendees/{attendee}  =>  event.attendee.update
// DELETE api/event/{event}/attendees/{attendee}  =>  event.attendee.delete
