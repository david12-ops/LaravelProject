<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\View\View;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sort = $request->sort ?: 'name';
        $sortDir = $request->sortDir == 'desc' ? 'DESC' : 'ASC';
        return view('employees.index', ['employees' => Employee::orderBy($sort, $sortDir)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'wage' => 'required|numeric|max:5'
        ]);

        Employee::create($validated);
        return redirect(route('employees.index'))->with('success', "Zaměstnanec byl vytvořen");
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee): View
    {
        return view('employess.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee): View
    {
        return view('employees.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        // kontrola duplicitnich lidi
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'wage' => 'required|numeric|max:5'
        ]);

        $employee->update($validated);
        return redirect(route('employees.index'))->with('success', "Zaměstnanec byl upraven");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect(route('employees.index'))->with('success', "Zaměstnanec byl smazán");
    }
}
