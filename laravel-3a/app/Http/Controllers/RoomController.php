<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : View
    {
//        return view('rooms.index', ['rooms'=>Room::all()]);
        $sort = $request->sort ?: 'name';
        $sortDir = $request->sortDir == 'desc' ? 'DESC' : 'ASC';
        return view('rooms.index', ['rooms'=>Room::orderBy($sort, $sortDir)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'no' => 'required|unique:rooms|max:5',
            'phone' => 'unique:rooms|max:5',
        ]);

        Room::create($validated);
        return redirect(route('rooms.index'))->with('success', "Místnost byla vytvořena");
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room) : View
    {
        return view('rooms.show', ['room'=>$room]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room) : View
    {
        return view('rooms.edit', ['room'=>$room]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room) : RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'no' => "required|unique:rooms,$room->id|max:5",
            'phone' => "unique:rooms, $room->id|max:5",
        ]);

        $room->update($validated);
        return redirect(route('rooms.index'))->with('success', "Místnost byla upravena");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room) : RedirectResponse
    {
        $room->delete();
        return redirect(route('rooms.index'))->with('success', "Místnost byla smazána");
    }
}
