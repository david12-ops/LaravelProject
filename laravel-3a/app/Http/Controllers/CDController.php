<?php

namespace App\Http\Controllers;

use App\Models\Cd;
use Illuminate\View\View;
use Illuminate\Http\Request;

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
        return view('cds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //auth id, cover, genre id
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|numeric|max:4',
            'auth id' => 'numeric|max:50',
            'genre_id' => 'numeric|max:50'
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
        return view('cds.edit', ['Cd' => $cd]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cd $cd)
    {

        $validated = $request->validate([
            'name' => 'required|unique:cds,$Cd->id|max:255',
            'year' => 'required|numeric|max:9999|min:1000',
            'auth id' => 'numeric|max:50',
            'genre_id' => 'numeric|max:50'
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
