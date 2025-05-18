<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {

        return view('events');
    }

    public function fetchEvents(Request $request)
    {
        $query = Event::query();

        if ($request->has('date') && $request->date) {
            $query->whereDate('event_date', $request->date);
        }

        if ($request->has('type') && $request->type) {
            $query->where('type', $request->type);
        }

        if ($request->has('location') && $request->location) {
            $query->where('location', 'LIKE', '%' . $request->location . '%');
        }

        return response()->json($query->get());
    }
}
