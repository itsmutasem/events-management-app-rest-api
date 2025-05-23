<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Http\Traits\CanLoadRelationships;
use App\Models\Event;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class EventController extends Controller
{
    use CanLoadRelationships;
    private readonly array $relations;
    public function __construct()
    {
        $this->relations = ['user', 'attendees', 'attendees.user'];
    }

    public function index()
    {
        $query = $this->loadRelationships(Event::query());
        return EventResource::collection(
            $query->latest()->paginate()
        );
        // Best used with Event::with('user') to avoid performance issues.
        // eager-loads the user to prevent extra queries
    }

    public function store(Request $request)
    {
        $event = Event::create([
            ... $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'start_time' => 'required|date',
                'end_time' => 'required|date|after:start_time'
            ]),
            'user_id' => 1
        ]);
        return new EventResource($event);
    }

    public function show(Event $event)
    {
        $event->load('user', 'attendees');
        return new EventResource($event);
    }

    public function update(Request $request, Event $event)
    {
        $event->update(
            $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'sometimes|date',
            'end_time' => 'sometimes|date|after:start_time'
        ]));
        return new EventResource($event);
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return response(status: 204);
    }
}
