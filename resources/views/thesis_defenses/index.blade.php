@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Daftar Thesis Defense</h2>

    <a href="{{ route('thesis-defenses.create') }}" class="btn btn-primary mb-3">+ Tambah Thesis Defense</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Thesis</th>
                <th>Room</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($defenses as $defense)
                <tr>
                    <td>{{ $defense->id }}</td>
                    <td>{{ $defense->thesis->title ?? '-' }}</td>
                    <td>{{ $defense->room->name ?? '-' }}</td>
                    <td>{{ $defense->defense_date }}</td>
                    <td>
                        <span class="badge 
                            @if($defense->defense_status == 'approved') bg-success 
                            @elseif($defense->defense_status == 'pending') bg-warning 
                            @else bg-danger 
                            @endif">
                            {{ ucfirst($defense->defense_status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('thesis-defenses.edit', $defense->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data defense.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection