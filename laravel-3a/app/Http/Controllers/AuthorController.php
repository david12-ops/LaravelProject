<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\View\View;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => "required|string|max:255",
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
    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => "required|unique:authors,$author->id|max:255",
        ]);

        $author->update($validated);
        return redirect(route('autors.index'))->with('success', "Autor byl upraven");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect(route('authors.index'))->with('success', "Autor byl smazán");
    }
}
