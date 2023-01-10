<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $eventActive = Event::whereDate('tanggal', '>=', Carbon::now())->latest()->get();
        $eventNonactive = Event::whereDate('tanggal', '<', Carbon::now())->latest()->paginate(10);
        return view('apps.landingpage.agenda.index', compact('eventActive', 'eventNonactive'));
    }
    public function show(Event $event)
    {
        return view('apps.landingpage.agenda.show', compact('event'));
    }

}
