<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use App\Models\Training;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainings = Training::latest()->paginate(10);
        return view('trainings.index', compact('trainings'));
    }
    /**
     * Show the form for creating a new resource.
     */
public function create()
    {
        return view('trainings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainingRequest $request)
    {
        $validatedData = $request->validated();
        Training::create($validatedData);
        return redirect()->route('trainings.index')
                         ->with('success', 'Data training berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
 public function show(Training $training)
    {
        return view('trainings.show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit(Training $training)
    {
        return view('trainings.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(UpdateTrainingRequest $request, Training $training)
    {
        $validatedData = $request->validated();
        $training->update($validatedData);
        return redirect()->route('trainings.index')
                         ->with('success', 'Data training berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        $training->delete();
        return redirect()->route('trainings.index')
                         ->with('success', 'Data training berhasil dihapus.');
    }
}