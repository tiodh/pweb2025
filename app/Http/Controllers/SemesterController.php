<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::all();
        return view('semesters.index', compact('semesters'));
    }

    public function create()
    {
        return view('semesters.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name'   => 'required|string|max:255',
            'academic_year'  => 'required|string|max:255',
            'order'          => 'required|integer|min:1',
            'status'         => 'required|string|max:50',
        ]);

        Semester::create($validated);

        return redirect()->route('semesters.index')->with('success', 'Data semester berhasil ditambahkan');
    }

    public function edit(Semester $semester)
    {
        return view('semesters.edit', compact('semester'));
    }

    public function update(Request $request, Semester $semester)
    {
        $validated = $request->validate([
            'student_name'   => 'required|string|max:255',
            'academic_year'  => 'required|string|max:255',
            'order'          => 'required|integer|min:1',
            'status'         => 'required|string|max:50',
        ]);

        $semester->update($validated);

        return redirect()->route('semesters.index')->with('success', 'Data semester berhasil diperbarui');
    }

    public function destroy(Semester $semester)
    {
        $semester->delete();
        return redirect()->route('semesters.index')->with('success', 'Data semester berhasil dihapus');
    }
}
