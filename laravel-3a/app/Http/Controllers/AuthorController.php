<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Cd;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\RedirectResponse;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sort = $request->sort ?: 'name';
        $sortDir = $request->sortDir == 'desc' ? 'DESC' : 'ASC';
        return view('authors.index', ['authors' => Author::orderBy($sort, $sortDir)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:30|unique:authors,name',
            'nationality' => 'required|string|max:15',
            'yearOfBirth' => 'required|numeric|min:1000|max:' . Carbon::now()->year,

        ]);

        Author::create($validated);
        return redirect(route('authors.index'))->with('success', "Autor byl vytvořen");
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author): View
    {
        return view('authors.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:30|unique:authors,name,' . $author->id,
            'nationality' => 'required|string|max:15',
            'yearOfBirth' => 'required|numeric|min:1000|max:' . Carbon::now()->year,

        ]);

        $author->update($validated);
        return redirect(route('authors.index'))->with('success', "Autor byl upraven");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        if ($author->cds()->count() == 0) {
            $author->delete();
            return redirect(route('authors.index'))->with('success', "Autor byl smazán");
        }

        return redirect(route('authors.index'))->with('error', "Nelze smazat autora, protože má cd v db!");
    }
}
