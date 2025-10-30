<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipRecipient;

use App\Models\Student;
use App\Models\Scholarship;
use App\Http\Requests\StoreScholarshipRecipientRequest;
use App\Http\Requests\UpdateScholarshipRecipientRequest;
class ScholarshipRecipientsController extends Controller
{

    public function index()
    {
        $scholarshipRecipients = ScholarshipRecipient::with(['student', 'scholarship'])
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

    public function store(StoreScholarshipRecipientRequest $request)
    {
        $validatedData = $request->validated();
        ScholarshipRecipient::create($validatedData);
        return redirect()->route('scholarship_recipients.index')
                        ->with('success', 'Data penerima beasiswa berhasil ditambahkan.');
    }

    public function show(ScholarshipRecipient $scholarshipRecipient)
    {
        return view('scholarship_recipients.show', compact('scholarshipRecipient'));
    }

    public function edit(ScholarshipRecipient $scholarshipRecipient)
    {
        $students = Student::orderBy('name', 'asc')->get();
        $scholarships = Scholarship::orderBy('name', 'asc')->get();

        return view('scholarship_recipients.edit', compact('scholarshipRecipient', 'students', 'scholarships'));
    }

    public function update(UpdateScholarshipRecipientRequest $request, ScholarshipRecipient $scholarshipRecipient)
    {

        $validatedData = $request->validated();
        $scholarshipRecipient->update($validatedData);

        return redirect()->route('scholarship_recipients.index')
                        ->with('success', 'Data penerima beasiswa berhasil diperbarui.');
    }

    public function destroy(ScholarshipRecipient $scholarshipRecipient)
    {
        $scholarshipRecipient->delete();
        return redirect()->route('scholarship_recipients.index')
                        ->with('success', 'Data penerima beasiswa berhasil dihapus.');
    }
}