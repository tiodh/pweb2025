<?php

namespace App\Http\Controllers;

use App\Models\thesis_examiners;
use App\Http\Requests\StoreThesisExaminersRequest;
use App\Http\Requests\UpdateThesisExaminersRequest;


class ThesisExaminersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $te = thesis_examiners::orderBy('id', 'desc')->paginate(10);
        return view('thesis_examiners.index', compact('te'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('thesis_examiners.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreThesisExaminersRequest $request)
    {
        thesis_examiners::create($request->validated());

        return redirect()->route('thesis-examiner.index')
            ->with('success', 'thesis examiners created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(thesis_examiners $thesis)
    {
        return redirect()->route('thesis-examiner.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit(thesis_examiners $thesis_examiner)
{
    return view('thesis_examiners.form', compact('thesis_examiner'));
}


    /**
     * Update the specified resource in storage.
     */
public function update(UpdateThesisExaminersRequest $request, thesis_examiners $thesis_examiner)
{
    $thesis_examiner->update($request->validated());

    return redirect()->route('thesis-examiner.index')
        ->with('success', 'Thesis examiner updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(thesis_examiners $thesis_examiner)
    {
        $thesis_examiner->delete();

        return redirect()->route('thesis-examiner.index')
            ->with('success', 'Thesis examiner deleted successfully.');
    }
}