<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use App\Models\Faculty;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::with('university')->latest()->paginate(10);
        return view('faculties.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $universities = University::all();
        return view('faculties.create', compact('universities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacultyRequest $request)
    {
        Faculty::create($request->validated());
        return redirect()->route('faculties.index')->with('success', 'Faculty created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        return view('faculties.show', compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        $universities = University::all();
        return view('faculties.edit', compact('faculty', 'universities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacultyRequest $request, Faculty $faculty)
    {
        $faculty->update($request->validated());
        return redirect()->route('faculties.index')->with('success', 'Faculty updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return redirect()->route('faculties.index')->with('success', 'Faculty deleted successfully.');
    }
}
