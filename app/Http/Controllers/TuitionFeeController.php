<?php

namespace App\Http\Controllers;

use App\Models\TuitionFee;
use Illuminate\Http\Request;

class TuitionFeeController extends Controller
{
    public function index()
    {
        $tuitionFees = TuitionFee::latest()->paginate(10);
        return view('tuition_fees.index', compact('tuitionFees'));
    }

    public function create()
    {
        return view('tuition_fees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        TuitionFee::create($validated);

        return redirect()->route('tuition_fees.index')->with('success', 'Tuition fee berhasil ditambahkan.');
    }

    public function edit(TuitionFee $tuitionFee)
    {
        return view('tuition_fees.edit', compact('tuitionFee'));
    }

    public function update(Request $request, TuitionFee $tuitionFee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $tuitionFee->update($validated);

        return redirect()->route('tuition_fees.index')->with('success', 'Tuition fee berhasil diperbarui.');
    }

    public function destroy(TuitionFee $tuitionFee)
    {
        $tuitionFee->delete();
        return redirect()->route('tuition_fees.index')->with('success', 'Tuition fee berhasil dihapus.');
    }
}