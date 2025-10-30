<?php

namespace App\Http\Controllers;

use App\Models\StudentAccount;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Http\Requests\UpdateStudentAccountRequest;
use App\Http\Requests\StoreStudentAccountRequest;


class StudentAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = StudentAccount::with(['user', 'student'])->paginate(10);

        return view('student_accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'student')->whereDoesntHave('studentAccount')->get();
        $students = Student::whereDoesntHave('studentAccount')->get();
        return view('student_accounts.create', compact('users','students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentAccountRequest $request)
    {
        $validateData = $request->validated();

        StudentAccount::create($validateData);
        return redirect()->route('student_accounts.index')->with('success','Akun mahasiswa berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentAccount $studentAccount)
    {
        $studentAccount->load(['user','student.studyProgram']);
        return view('student_accounts.show', compact('studentAccount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentAccount $studentAccount)
    {
        $users = User::where('role', 'student')->whereDoesntHave('studentAccount')->orWhere('id', $studentAccount->user_id)->get();

        $students = Student::whereDoesntHave('studentAccount')->orWhere('id', $studentAccount->student_id)->get();

        return view('student_accounts.edit', compact('studentAccount','users','students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentAccountRequest $request, StudentAccount $studentAccount)
    {
        $validateData = $request->validated();
        $studentAccount->update($validateData);

        return redirect()->route('student_accounts.index')->with('success','Akun mahasiswa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentAccount $studentAccount)
    {
        $studentAccount->delete();
        return redirect()->route('student_accounts.index')->with('success','Akun mahasiswa berhasil dihapus');
    }
}