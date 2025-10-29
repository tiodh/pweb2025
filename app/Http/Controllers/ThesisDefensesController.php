<?php

namespace App\Http\Controllers;

use App\Models\thesis_defenses;
use Illuminate\Http\Request;

class ThesisDefensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $thesis_defenses = thesis_defenses::with(['thesis', 'room'])->get();
        return view('thesis_defenses.index', compact('defenses'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $theses = Thesis::all();
        $rooms = rooms::all();
        return view('thesis_defenses.create', compact('theses', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'thesis_id' => 'required|exists:theses,id',
            'room_id' => 'required|exists:rooms,id',
            'defense_date' => 'required|date',
            'defense_status' => 'required|string',
        ]);

        thesis_defenses::create($validated);
        return redirect()->route('thesis_defenses.index')->with('success', 'Data defense berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(thesis_defenses $thesis_defenses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(thesis_defenses $thesis_defenses)
    {
        $theses = Thesis::all();
        $rooms = rooms::all();
        return view('thesis_defenses.edit', compact('thesisDefense', 'theses', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, thesis_defenses $thesis_defenses)
    {
        $validated = $request->validate([
            'thesis_id' => 'required|exists:theses,id',
            'room_id' => 'required|exists:rooms,id',
            'defense_date' => 'required|date',
            'defense_status' => 'required|string',
        ]);

        $thesis_defenses->update($validated);
        return redirect()->route('thesis_defenses.index')->with('success', 'Data defense berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(thesis_defenses $thesis_defenses)
    {
        $thesis_defenses->delete();
        return redirect()->route('thesis_defenses.index')->with('success', 'Data defense berhasil dihapus!');
    }
}
