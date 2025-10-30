<?php

namespace App\Http\Controllers;
use App\Models\Lecturer;
use App\Models\Theses;
use App\Models\ThesisSupervisor;
use App\Http\Requests\StoreThesisSupervisorsRequest;
use App\Http\Requests\UpdateThesisSupervisorsRequest;

class ThesisSupervisorsController extends Controller
{ 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supervisors = ThesisSupervisor::with(['lecturers', 'theses'])->latest()->paginate(10);
        return view('thesis_supervisors.index', compact('supervisors'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lecturers = Lecturer::select('id', 'name')->get();
        $theses = Theses::select('id', 'title')->get();     
        return view('thesis_supervisors.create', compact('lecturers', 'theses'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreThesisSupervisorsRequest $request)
    {
        ThesisSupervisor::create($request->validated());
        return redirect()->route('thesis_supervisors.index')->with('success', 'Data pembimbing berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(ThesisSupervisor $thesisSupervisor)
    {
        return view('thesis_supervisors.show', compact('thesisSupervisor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ThesisSupervisor $thesisSupervisor)
    {
        $lecturers = Lecturer::select('id', 'name')->get();
        $theses = Theses::select('id', 'title')->get();
        return view('thesis_supervisors.edit', compact('thesisSupervisor', 'lecturers', 'theses'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateThesisSupervisorsRequest $request, ThesisSupervisor $thesisSupervisor)
    {
        $thesisSupervisor->update($request->validated());
        return redirect()->route('thesis_supervisors.index')->with('success', 'Data pembimbing skripsi berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ThesisSupervisor $thesisSupervisor)
    {
        $thesisSupervisor->delete();
        return redirect()->route('thesis_supervisors.index')->with('success', 'Data pembibing skripsi berhasil dihapus');
    }
}
