<?php

namespace App\Http\Controllers;

use App\Models\lecturers;
use Illuminate\Http\Request;
use App\Models\StudentOrganization;
use App\Http\Requests\StoreStudentOrganizationRequest;
use App\Http\Requests\UpdateStudentOrganizationRequest;

class StudentOrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentOrganizations = StudentOrganization::orderBy('id', 'desc')->paginate(10);
        return view('student_organizations.index', compact('studentOrganizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lecturers = lecturers::orderBy('name')->get();
        return view('student_organizations.form', compact('lecturers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentOrganizationRequest $request)
    {
        StudentOrganization::create($request->validated());

        return redirect()->route('student-organizations.index')
            ->with('success', 'Student Organization created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentOrganization $studentOrganization)
    {
        return redirect()->route('student-organizations.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentOrganization $studentOrganization)
    {
        $lecturers = lecturers::orderBy('name')->get();
        return view('student_organizations.form', compact('studentOrganization', 'lecturers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentOrganizationRequest $request, StudentOrganization $studentOrganization)
    {
        $studentOrganization->update($request->validated());

        return redirect()->route('student-organizations.index')
            ->with('success', 'Student Organization updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentOrganization $studentOrganization)
    {
        $studentOrganization->delete();

        return redirect()->route('student-organizations.index')
            ->with('success', 'Student Organization deleted successfully.');
    }
}
