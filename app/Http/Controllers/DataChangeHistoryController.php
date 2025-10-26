<?php

namespace App\Http\Controllers;

use App\Models\DataChangeHistory;
use Illuminate\Http\Request;

class DataChangeHistoryController extends Controller
{
    // Menampilkan semua log perubahan
    public function index()
    {
        $histories = DataChangeHistory::with('user')->latest()->get();
        return view('data_change_histories.index', compact('histories'));
    }

    // Menghapus satu log (opsional)
    public function destroy($id)
    {
        $history = DataChangeHistory::findOrFail($id);
        $history->delete();

        return redirect()->back()->with('success', 'Log berhasil dihapus!');
    }
}
