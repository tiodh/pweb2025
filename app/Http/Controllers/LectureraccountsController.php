<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorelectureraccountsRequest;
use App\Http\Requests\UpdatelectureraccountsRequest;
use App\Models\lectureraccounts;
use App\Models\User;
use App\Models\lecturers;

class LectureraccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = lectureraccounts::with(['user', 'lecturer'])->get();
        return view('lecturer_accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $lecturers = lecturers::all();
        return view('lecturer_accounts.create', compact('users', 'lecturers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorelectureraccountsRequest $request)
    {
        lectureraccounts::create($request->validated());
        return redirect()
            ->route('lecturer-accounts.index')
            ->with('success', 'Lecturer account created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(lectureraccounts $lectureraccounts)
    {
        return view('lecturer_accounts.show', compact('lecturer_account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lectureraccounts $lectureraccounts)
    {
        $users = User::all();
        $lecturers = lecturers::all();
        return view('lecturer_accounts.edit', compact('lecturer_account', 'users', 'lecturers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelectureraccountsRequest $request, lectureraccounts $lectureraccounts)
    {
        $lectureraccounts->update($request->validated());
        return redirect()
            ->route('lecturer-accounts.index')
            ->with('success', 'Lecturer account updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lectureraccounts $lectureraccounts)
    {
        



        $lectureraccounts->delete();
        return redirect()
            ->route('lecturer-accounts.index')
            ->with('success', 'Lecturer account deleted successfully.');
    }
}
