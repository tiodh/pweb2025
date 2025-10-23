<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;
use App\Models\University;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universities = University::orderBy('id', 'desc')->paginate(10);
        return view('university.index', compact('universities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('university.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUniversityRequest $request)
    {
        University::create($request->validated());

        return redirect()->route('universities.index')
            ->with('success', 'University created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(University $university)
    {
        return redirect()->route('universities.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(University $university)
    {
        return view('university.form', compact('university'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUniversityRequest $request, University $university)
    {
        $university->update($request->validated());

        return redirect()->route('universities.index')
            ->with('success', 'University updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(University $university)
    {
        $university->delete();

        return redirect()->route('universities.index')
            ->with('success', 'University deleted successfully.');
    }
}
