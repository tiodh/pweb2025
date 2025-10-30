<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storescholarship_recipientsRequest;
use App\Http\Requests\Updatescholarship_recipientsRequest;
use App\Models\scholarship_recipients;
use App\Models\Student;
use App\Models\Scholarship;

class ScholarshipRecipientsController extends Controller
{

    public function index()
    {
        $scholarshipRecipients = scholarship_recipients::with(['student', 'scholarship'])
                                    ->latest()
                                    ->paginate(10);

        return view('scholarship_recipients.index', compact('scholarshipRecipients'));
    }

    public function create()
    {

        $students = Student::orderBy('name', 'asc')->get();
        $scholarships = Scholarship::orderBy('name', 'asc')->get();
        return view('scholarship_recipients.create', compact('students', 'scholarships'));
    }

    public function store(Storescholarship_recipientsRequest $request)
    {
        $validatedData = $request->validated();
        scholarship_recipients::create($validatedData);
        return redirect()->route('scholarship-recipients.index')
                        ->with('success', 'Data penerima beasiswa berhasil ditambahkan.');
    }

    public function show(scholarship_recipients $scholarshipRecipient)
    {
        // return view('scholarship_recipients.show', compact('scholarshipRecipient'));
    }

    public function edit(scholarship_recipients $scholarshipRecipient)
    {
        $students = Student::orderBy('name', 'asc')->get();
        $scholarships = Scholarship::orderBy('name', 'asc')->get();

        return view('scholarship_recipients.edit', compact('scholarshipRecipient', 'students', 'scholarships'));
    }

    public function update(Updatescholarship_recipientsRequest $request, scholarship_recipients $scholarshipRecipient)
    {

        $validatedData = $request->validated();
        $scholarshipRecipient->update($validatedData);

        return redirect()->route('scholarship-recipients.index')
                        ->with('success', 'Data penerima beasiswa berhasil diperbarui.');
    }

    public function destroy(scholarship_recipients $scholarshipRecipient)
    {
        $scholarshipRecipient->delete();
        return redirect()->route('scholarship-recipients.index')
                        ->with('success', 'Data penerima beasiswa berhasil dihapus.');
    }
}