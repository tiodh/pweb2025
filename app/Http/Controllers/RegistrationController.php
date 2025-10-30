<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Student;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with('student')->get();
        return view('registrations.index', compact('registrations'));
    }

    public function create()
    {
        $students = Student::all();
        return view('registrations.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'semester' => 'required|string',
            'academic_year' => 'required|string',
            'status' => 'required|string',
        ]);

        Registration::create($request->all());
        return redirect()->route('registrations.index')->with('success', 'Registration added successfully');
    }

    public function edit(Registration $registration)
    {
        $students = Student::all();
        return view('registrations.edit', compact('registration', 'students'));
    }

    public function update(Request $request, Registration $registration)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'semester' => 'required|string',
            'academic_year' => 'required|string',
            'status' => 'required|string',
        ]);

        $registration->update($request->all());
        return redirect()->route('registrations.index')->with('success', 'Registration updated successfully');
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();
        return redirect()->route('registrations.index')->with('success', 'Registration deleted successfully');
    }
}
