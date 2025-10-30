<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::all();
        return view('achievement.index', compact('achievements'));
    }

    public function create()
    {
        return view('achievement.create');
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'date' => 'nullable|date',
        'student_id' => 'required|integer',
    ]);

    Achievement::create($validated);

    return redirect()->route('achievement.index')->with('success', 'Data prestasi berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $achievement = Achievement::findOrFail($id);
        return view('achievement.edit', compact('achievement'));
    }

    public function update(Request $request, $id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->update($request->all());
        return redirect()->route('achievement.index');
    }

    public function destroy($id)
    {
        Achievement::destroy($id);
        return redirect()->route('achievement.index');
    }
}
