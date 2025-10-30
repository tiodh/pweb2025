<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrainingParticipantRequest;
use App\Http\Requests\UpdateTrainingParticipantRequest;
use App\Models\TrainingParticipant;
use App\Models\Student;
use App\Models\training;

class TrainingParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participants = TrainingParticipant::with(['student', 'training'])->paginate(10);
        return view('training_participant.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::orderBy('name')->get(['id', 'name', 'nim']);
        $trainings = Training::orderBy('name')->get(['id', 'name', 'start_date', 'end_date']);
        return view('training_participant.create', compact('students', 'trainings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainingParticipantRequest $request)
    {
        TrainingParticipant::create($request->validated());
        return redirect()->route('training-participant.index')
                        ->with('success', 'Peserta pelatihan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingParticipant $trainingParticipant)
    {
        // $trainingParticipant->load(['student', 'training']);
        // return view('training_participant.show', compact('trainingParticipant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingParticipant $trainingParticipant)
    {
        $students = Student::orderBy('name')->get(['id', 'name', 'nim']);
        $trainings = Training::orderBy('name')->get(['id', 'name', 'start_date', 'end_date']);
        return view('training_participant.edit', compact('trainingParticipant', 'students', 'trainings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingParticipantRequest $request, TrainingParticipant $trainingParticipant)
    {
        $trainingParticipant->update($request->validated());
        return redirect()->route('training-participant.index')
                        ->with('success', 'Data peserta pelatihan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingParticipant $trainingParticipant)
    {
        $trainingParticipant->delete();
        return redirect()->route('training-participant.index')
                        ->with('success', 'Peserta pelatihan berhasil dihapus.');
    }
}
