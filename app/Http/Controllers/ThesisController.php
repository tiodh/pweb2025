<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use App\Models\Student;
use App\Http\Requests\StoreThesisRequest;
use App\Http\Requests\UpdateThesisRequest;
use Illuminate\Http\Request;

class ThesisController extends Controller
{
    public function index()
    {
        $theses = Thesis::with('student')->latest()->get();
        return view('thesis.index', compact('thesis'));
    }

    public function create()
    {
        $students = Student::all(); 
        return view('thesis.create', compact('students'));
    }

    public function store(StoreThesisRequest $request)
    {
        Thesis::create($request->validated());
        return redirect()->route('thesis.index')->with('success', 'Data skripsi berhasil ditambahkan.');
    }

    public function show(Thesis $thesis)
    {
        return view('thesis.show', compact('thesis'));
    }

    public function edit(Thesis $thesis)
    {
        $students = Student::all();
        return view('thesis.edit', compact('thesis', 'students'));
    }

    public function update(UpdateThesisRequest $request, Thesis $thesis)
    {
        $thesis->update($request->validated());
        return redirect()->route('thesis.index')->with('success', 'Data skripsi berhasil diperbarui.');
    }

    public function destroy(Thesis $thesis)
    {
        $thesis->delete();
        return redirect()->route('thesis.index')->with('success', 'Data skripsi berhasil dihapus.');
    }
}