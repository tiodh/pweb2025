<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRegistrationRequest;
use App\Http\Requests\UpdateCourseRegistrationRequest;
use App\Models\CourseRegistration;
use App\Models\Registration;
use App\Models\classes;

class CourseRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courseRegistrations = CourseRegistration::with(['registration', 'class'])->get();
        return view('course_registration.index', compact('courseRegistrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $registrations = Registration::all();
        $classes = classes::all(); 
        return view('course_registration.create', compact('registrations', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRegistrationRequest $request)
    {
        CourseRegistration::create($request->validated());
        return redirect()->route('course_registration.index')->with('success', 'KRS berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseRegistration $courseRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseRegistration $courseRegistration, $id)
    {
        $courseRegistration = CourseRegistration::findOrFail($id);
        $registrations = Registration::all();
        $classes = classes::all();

        return view('course_registration.create', compact('courseRegistration', 'registrations', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRegistrationRequest $request, CourseRegistration $courseRegistration)
    {
        $courseRegistration->update($request->validated());
        return redirect()->route('course-registration.index')->with('success', 'KRS berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseRegistration $courseRegistration)
    {
        $courseRegistration->delete();
        return redirect()->route('course-registration.index')->with('success', 'KRS berhasil dihapus!');
    }
}
