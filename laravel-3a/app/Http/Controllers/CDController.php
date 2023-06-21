<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Cd;
use App\Models\Genre;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\RedirectResponse;

class CDController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sort = $request->sort ?: 'name';
        $sortDir = $request->sortDir == 'desc' ? 'DESC' : 'ASC';
        return view('cds.index', ['cds' => Cd::orderBy($sort, $sortDir)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('cds.create', ['authors' =>  Author::all(), 'genres' =>  Genre::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:cds,name',
            'year' => 'required|numeric|min:1000|max:' . Carbon::now()->year,
            'auth_id' => 'required|numeric|exists:authors,id',
            'genre_id' => 'required|numeric|exists:genres,id'
        ]);

        Cd::create($validated);
        return redirect(route('cds.index'))->with('success', "Cd bylo vytvořeno");
    }

    /**
     * Display the specified resource.
     */
    public function show(Cd $cd): View
    {
        return view('cds.show', ['Cd' => $cd]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cd $cd)
    {

        return view('cds.edit', [
            'Cd' => $cd,
            'genres' => Genre::all(),
            'authors' => Author::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cd $cd): RedirectResponse
    {

        $validated = $request->validate([
            'name' => 'required|string|max:20|unique:cds,name,' . $cd->id,
            'year' => 'required|numeric|min:1000|max:' . Carbon::now()->year,
            'auth_id' => 'required|numeric|exists:authors,id',
            'genre_id' => 'required|numeric|exists:genres,id'
        ]);

        $cd->update($validated);
        return redirect(route('cds.index'))->with('success', "Cd bylo upraveno");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cd $cd)
    {
        $cd->delete();
        return redirect(route('cds.index'))->with('success', "Cd bylo smazáno");
    }
}
