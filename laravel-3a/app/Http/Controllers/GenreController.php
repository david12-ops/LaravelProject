<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sort = $request->sort ?: 'name';
        $sortDir = $request->sortDir == 'desc' ? 'DESC' : 'ASC';
        return view('genres.index', ['genres' => Genre::orderBy($sort, $sortDir)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:genres,name|max:20',
            'description' => 'string|max:120|nullable'
        ]);

        Genre::create($validated);
        return redirect(route('genres.index'))->with('success', "Žánr byl vytvořen");
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre): View
    {
        return view('genres.show', ['genre' => $genre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre): View
    {
        return view('genres.edit', ['genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre): RedirectResponse
    {
        $validated = $request->validate([

            'name' => 'required|string|max:20|unique:genres,name,' . $genre->id,
            'description' => 'string|max:120|nullable'
        ]);

        $genre->update($validated);
        return redirect(route('genres.index'))->with('success', "Žánr byl upraven");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect(route('genres.index'))->with('success', "Žánr byl smazán");
    }
}
