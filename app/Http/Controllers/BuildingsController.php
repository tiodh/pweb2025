<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorebuildingsRequest;
use App\Http\Requests\UpdatebuildingsRequest;
use App\Models\buildings;

class BuildingsController extends Controller
{
    public function index()
    {
        $buildings = buildings::all();
        return view('buildings.index', compact('buildings'));
    }

    public function create()
    {
        return view('buildings.create');
    }

    public function store(StorebuildingsRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'nullable',
            'floors' => 'required|integer',
            'building_code' => 'required|unique:buildings',
        ]);

        buildings::create($request->all());
        return redirect()->route('buildings.index')->with('success', 'Building added!');
    }

    public function show(buildings $building)
    {
        return view('buildings.show', compact('building'));
    }

    public function edit(buildings $building)
    {
        return view('buildings.edit', compact('building'));
    }

    public function update(UpdatebuildingsRequest $request, buildings $building)
    {
        $request->validate([
            'name' => 'required',
            'floors' => 'required|integer',
            'building_code' => 'required|unique:buildings,building_code,' . $building->id,
        ]);

        $building->update($request->all());
        return redirect()->route('buildings.index')->with('success', 'Building updated!');
    }

    public function destroy(buildings $building)
    {
        $building->delete();
        return redirect()->route('buildings.index')->with('success', 'Building deleted!');
    }
}
