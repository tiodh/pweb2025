@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">📜 Data Change History</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Affected Table</th>
                <th>Action</th>
                <th>Change Timestamp</th>
                <th>Action (Admin)</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($histories as $history)
                <tr>
                    <td>{{ $history->id }}</td>
                    <td>{{ $history->user->name ?? 'N/A' }}</td>
                    <td>{{ $history->affected_table }}</td>
                    <td>
                        <span class="badge 
                            @if($history->action == 'insert') bg-success 
                            @elseif($history->action == 'update') bg-warning text-dark 
                            @else bg-danger @endif">
                            {{ strtoupper($history->action) }}
                        </span>
                    </td>
                    <td>{{ $history->change_timestamp }}</td>
                    <td>
                        <form action="{{ route('data_change_histories.destroy', $history->id) }}" method="POST" onsubmit="return confirm('Hapus log ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada log perubahan data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
