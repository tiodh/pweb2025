<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storeacademic_yearsRequest;
use App\Http\Requests\Updateacademic_yearsRequest;
use App\Models\academic_years;

class AcademicYearsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicYears = academic_years::orderByDesc('id')->get();
        return view('academic_years.index', compact('academicYears'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('academic_years.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeacademic_yearsRequest $request)
    {
        academic_years::create($request->validated());
        return redirect()->route('academic-years.index')->with('success', 'Tahun akademik berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(academic_years $academic_year)
    {
        return view('academic_years.edit', compact('academic_year'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateacademic_yearsRequest $request, academic_years $academic_year)
    {
        $academic_year->update($request->validated());
        return redirect()->route('academic-years.index')->with('success', 'Tahun akademik berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(academic_years $academic_year)
    {
        $academic_year->delete();
        return redirect()->route('academic-years.index')->with('success', 'Tahun akademik berhasil dihapus.');
    }
}
