<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseRegistration;
use App\Models\Registration;
use App\Models\ClassModel;


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
        // fk registrasi dan class
        $registrations = Registration::all();
        $classes = ClassModel::all(); 
        return view('course_registration.create', compact('registrations', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeCourseRegistrationRequest $request)
    {
        CourseRegistration::create($request->validated());
        return redirect()->route('course_registration.index')->with('success', 'KRS berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $courseRegistration = CourseRegistration::findOrFail($id);
        $registrations = Registration::all();
        $classes = ClassModel::all();

        return view('course_registration.create', compact('courseRegistration', 'registrations', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(CourseRegistrationRequest $request, CourseRegistration $courseRegistration)
    {
        $courseRegistration->update($request->validated());
        return redirect()->route('course_registration.index')->with('success', 'KRS berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseRegistration $courseRegistration)
    {
        $courseRegistration->delete();
        return redirect()->route('course_registration.index')->with('success', 'KRS berhasil dihapus!');
    }
}
