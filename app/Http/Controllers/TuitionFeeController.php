<?php

namespace App\Http\Controllers;

use App\Models\TuitionFee;
use App\Models\StudyProgram; // untuk dropdown FK
use App\Http\Requests\StoreTuitionFeeRequest; // sebelumnya pake request dasar
use App\Http\Requests\UpdateTuitionFeeRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TuitionFeeController extends Controller
{
    public function index()
    {
        // ubah1: pake studyProgram untuk eagernya
        $tuitionFees = TuitionFee::with('studyProgram')->latest()->paginate(10);
        return view('tuition_fees.index', compact('tuitionFees'));
    }

    public function create()
    {
        // ubah2: Ambil semua prodi buat dropdown form
        $studyPrograms = StudyProgram::orderBy('name')->get();
        return view('tuition_fees.create', compact('studyPrograms'));
    }

    // ubah3: pake form req buat validasi 
    public function store(StoreTuitionFeeRequest $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'amount' => 'required|numeric|min:0',
        //     'description' => 'nullable|string',
        // ]);

        TuitionFee::create($request->validated());

        return redirect()->route('tuition-fees.index')->with('success', 'Tuition fee berhasil ditambahkan.'); // pengen ubah jadi biaya kuliah, tapi sama aja dah
    }

    public function edit(TuitionFee $tuitionFee)
    {
        // ubah4: Ambil dari studyPrograms juga buat isi dropdown di menu edit
        $studyPrograms = StudyProgram::orderBy('name')->get();
        return view('tuition_fees.edit', compact('tuitionFee', 'studyPrograms'));
    }

    // ubah5: pake update request
    public function update(UpdateTuitionFeeRequest $request, TuitionFee $tuitionFee)
    {
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'amount' => 'required|numeric|min:0',
        //     'description' => 'nullable|string',
        // ]);

        $tuitionFee->update($request->validated());

        return redirect()->route('tuition-fees.index')->with('success', 'Tuition fee berhasil diperbarui.');
    }

    public function destroy(TuitionFee $tuitionFee)
    {
        $tuitionFee->delete();
        return redirect()->route('tuition-fees.index')->with('success', 'Tuition fee berhasil dihapus.');
    }
}