<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudyProgramRequest;
use App\Http\Requests\UpdateStudyProgramRequest;
use App\Models\StudyProgram;
use App\Models\Department;


class StudyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = StudyProgram::with('department')->orderBy('id', 'desc')->get();
        return view('study_program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('study_program.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudyProgramRequest $request)
    {
        $validated = $request->validated();
        StudyProgram::create($validated);
        return redirect()->route('study-programs.index')->with('success', '✅ Study Program berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudyProgram $studyProgram)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
    */
    public function edit(StudyProgram $studyProgram)
    {
        $departments = Department::all();
        return view('study_program.edit', compact('studyProgram', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudyProgramRequest $request, StudyProgram $studyProgram)
    {
        $validated = $request->validated();
        $studyProgram->update($validated);
        return redirect()->route('study-programs.index')->with('success', '✅ Study Program berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudyProgram $studyProgram)
    {
        $studyProgram->delete();
        return redirect()->route('study-programs.index')->with('success', '🗑️ Study Program berhasil dihapus!');
    }
}
