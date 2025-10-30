<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storeteaching_lecturersRequest;
use App\Http\Requests\Updateteaching_lecturersRequest;
use App\Models\teaching_lecturers;
use App\Models\lecturers;
use App\Models\classes;

class TeachingLecturersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $teachings = teaching_lecturers::with(['lecturer', 'class'])->get();
        return view('teaching_lecturers.index', compact('teachings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lecturers = lecturers::all();
        $classes = classes::all();
        return view('teaching_lecturers.form', compact('lecturers', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeteaching_lecturersRequest $request)
    {
        teaching_lecturers::create($request->validated());

        return redirect()   ->route('teaching-lecturers.index')
                            ->with('success', 'Teaching Lecturer created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(teaching_lecturers $teaching_lecturers)
    {
        // return view('teaching_lecturers.show', compact('teaching_lecturer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(teaching_lecturers $teaching_lecturers)
    {
        $lecturers = lecturers::all();
        $classes = Classes::all();
        return view('teaching_lecturers.form', compact('teaching_lecturer', 'lecturers', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateteaching_lecturersRequest $request, teaching_lecturers $teaching_lecturers)
    {
        $teaching_lecturers->update($request->validated());
        return redirect()->route('teaching-lecturers.index')
            ->with('success', 'Teaching Lecturer updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(teaching_lecturers $teaching_lecturers)
    {
        $teaching_lecturers->delete();
        return redirect()->route('teaching-lecturers.index')
            ->with('success', 'Teaching Lecturer deleted successfully!');
    }
}
