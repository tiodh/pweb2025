<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorecoursesRequest;
use App\Http\Requests\UpdatecoursesRequest;
use App\Models\courses;
use App\Models\StudyProgram;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = courses::with('studyProgram')
                    ->orderBy('id', 'desc')
                    ->paginate(10);
        return view('course.index', compact('courses'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $studyPrograms = StudyProgram::all();
        return view('course.form', compact('studyPrograms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecoursesRequest $request)
    {
        courses::create($request->validated());

        return redirect()->route('course.index')
                        ->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(courses $courses)
    {
        return redirect()->route('course.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(courses $courses)
    {
        $studyPrograms = StudyProgram::all();
        return view('course.form', compact('courses', 'studyPrograms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecoursesRequest $request, courses $courses)
    {
        $courses->update($request->validated());
        return redirect()   ->route('course.index')
                            ->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(courses $courses)
    {
         $courses->delete();
        return redirect()   ->route('course.index')
                            ->with('success', 'Data mata kuliah berhasil dihapus.');
    }
}
