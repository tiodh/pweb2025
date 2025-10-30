<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataChangeHistoryRequest;
use App\Http\Requests\UpdateDataChangeHistoryRequest;
use App\Models\DataChangeHistory;

class DataChangeHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = DataChangeHistory::with('user')->latest()->get();
        return view('data_change_history.index', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDataChangeHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DataChangeHistory $dataChangeHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataChangeHistory $dataChangeHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataChangeHistoryRequest $request, DataChangeHistory $dataChangeHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataChangeHistory $dataChangeHistory)
    {
        $dataChangeHistory->delete();

        return redirect()->back()->with('success', 'Log berhasil dihapus!');
    }
}
