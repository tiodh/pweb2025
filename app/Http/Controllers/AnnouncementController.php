<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreannouncementRequest;
use App\Http\Requests\UpdateannouncementRequest;
use App\Models\announcement;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::with('user')
            ->latest('date')
            ->paginate(10);
        
        return view('annountcement.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('annountcement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreannouncementRequest $request)
    {
         $validated = $request->validated();
        $validated['user_id'] = auth()->id() ?? 1;
        
        Announcement::create($validated);

        return redirect()
            ->route('announcement.index')
            ->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(announcement $announcement)
    {
        $announcement->load('user');
        return view('annountcement.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(announcement $announcement)
    {
        return view('annountcement.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateannouncementRequest $request, announcement $announcement)
    {
        $announcement->update($request->validated());

        return redirect()
            ->route('announcement.index')
            ->with('success', 'Pengumuman berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(announcement $announcement)
    {
        $announcement->delete();

        return redirect()
            ->route('announcement.index')
            ->with('success', 'Pengumuman berhasil dihapus!');
    }
}
