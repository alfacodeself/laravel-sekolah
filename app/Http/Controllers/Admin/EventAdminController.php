<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Services\PublishService;
use App\Models\Event;

class EventAdminController extends Controller
{
    protected $publishService;

    public function __construct(PublishService $publishService)
    {
        $this->publishService = $publishService;
    }
    public function index()
    {
        $events = Event::all();
        return view('apps.admin.agenda.index', compact('events'));
    }
    public function edit(Event $event)
    {
        return view('apps.admin.agenda.edit', compact('event'));
    }
    public function store(EventRequest $eventRequest)
    {
        try {
            $data = $eventRequest->all();
            if ($eventRequest->hasFile('thumbnail')) {
                $data['thumbnail'] = $this->publishService->fileStoreHandler($eventRequest->file('thumbnail'), 'public/img/agenda');
            }
            Event::create($data);
            return redirect()->route('admin.agenda.index')->with('success', 'Agenda baru berhasil dibuat!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function update(Event $event, EventRequest $eventRequest)
    {
        try {
            $data = $eventRequest->all();
            if ($eventRequest->hasFile('thumbnail')) {
                if ($event->thumbnail != null) $this->publishService->fileDeleteHandler($event->thumbnail);
                $data['thumbnail'] = $this->publishService->fileStoreHandler($eventRequest->file('thumbnail'), 'public/img/agenda');
            }else {
                $data['thumbnail'] = $event->thumbnail;
            }
            $event->update($data);
            return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil diubah!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function destroy(Event $event)
    {
        try {
            $this->publishService->fileDeleteHandler($event->thumbnail);
            $event->deleteOrFail();
            return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil dihapus!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
