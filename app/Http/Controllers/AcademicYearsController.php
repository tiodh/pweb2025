<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storeacademic_yearsRequest;
use App\Http\Requests\Updateacademic_yearsRequest;
use App\Models\AcademicYear;

class AcademicYearsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicYears = AcademicYear::orderByDesc('id')->get(); // ✅ ganti nama model
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
        // ✅ simpan hasil validasi ke variabel
        $validated = $request->validate([
            'start_year' => 'required|integer|min:2000',
            'end_year' => 'required|integer|min:2000',
            'active_status' => 'required|boolean',
            'notes' => 'nullable|string|max:255',
        ]);

        // ✅ gunakan model yang benar + titik koma
        AcademicYear::create($validated);

        return redirect()
            ->route('academic-years.index')
            ->with('success', 'Tahun akademik berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicYear $academic_year)
    {
        return view('academic_years.edit', compact('academic_year'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateacademic_yearsRequest $request, AcademicYear $academic_year)
    {
        $academic_year->update($request->validated());
        return redirect()
            ->route('academic-years.index')
            ->with('success', 'Tahun akademik berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicYear $academic_year)
    {
        $academic_year->delete();
        return redirect()
            ->route('academic-years.index')
            ->with('success', 'Tahun akademik berhasil dihapus.');
    }
}
