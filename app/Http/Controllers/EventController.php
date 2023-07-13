<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', ['events' => $events]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_event' => 'required|unique:events|max:255',
            'lokasi' => 'required',
            'tgl' => 'required|date',
            'gambar' => 'required|nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('images', 'uploads');
            $validatedData['gambar'] = $imagePath;
        }

        Event::create($validatedData);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'nama_event' => 'required|unique:events,nama_event,' . $event->id . '|max:255',
            'lokasi' => 'required',
            'tgl' => 'required|date',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $event->update($validatedData);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('images', 'uploads');
            $event->gambar = $imagePath;
            $event->save();
        }

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $events = Event::where('nama_event', 'like', "%$keyword%")
            ->orWhere('lokasi', 'like', "%$keyword%")
            ->orWhere('tgl', 'like', "%$keyword%")
            ->get();

        return view('events.index', compact('events'));
    }
}
