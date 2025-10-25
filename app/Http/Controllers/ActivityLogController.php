<?php
namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        $logs = ActivityLog::with('user')->latest()->paginate(10);
        return view('activity_logs.index', compact('logs'));
    }

    public function store(Request $request)
    {
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => $request->action,
            'ip_address' => $request->ip(),
            'timestamp' => now(),
        ]);

        return redirect()->back()->with('success', 'Aktivitas berhasil dicatat.');
    }
}
