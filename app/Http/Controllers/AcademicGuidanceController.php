<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAcademicGuidanceRequest;
use App\Http\Requests\UpdateAcademicGuidanceRequest;
use App\Models\AcademicGuidance;
use Illuminate\Http\Request;

class AcademicGuidanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $lecturers = Lecturer::all();
        return view('academic_guidances.create', compact('students', 'lecturers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        AcademicGuidance::create($request->validated());

        return redirect()->route('academic-guidances.index')
                         ->with('success', 'Data bimbingan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicGuidance $academicGuidance)
    {
        $students = Student::all();
        $lecturers = Lecturer::all();
        return view('academic_guidances.edit', compact('academicGuidance','students','lecturers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicGuidance $academicGuidance)
    {
        $academicGuidance->update($request->all());
        return redirect()->route('academic-guidances.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicGuidance $academicGuidance)
    {
        $academicGuidance->update($request->validated());

        return redirect()->route('academic-guidances.index')
                         ->with('success', 'Data bimbingan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicGuidance $academicGuidance)
    {
        $academicGuidance->delete();
        return redirect()->route('academic-guidances.index');
    }
}
