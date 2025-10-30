@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">Daftar Pembimbing Tesis</h2>
        <a href="{{ route('thesis-supervisors.create') }}" class="btn btn-success">Tambah Pembimbing</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>#</th>
                            <th>Judul Tesis</th>
                            <th>Dosen Pembimbing</th>
                            <th>Peran (Role)</th>
                            <th>Status Persetujuan</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($supervisors as $index => $supervisor)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $supervisor->thesis->title ?? 'N/A' }}</td>
                                <td>{{ $supervisor->lecturer->name ?? 'N/A' }}</td>
                                <td class="text-center">{{ $supervisor->role }}</td>
                                <td class="text-center">
                                    @php
                                        $badgeClass = match($supervisor->approval_status) {
                                            'approved' => 'bg-success',
                                            'rejected' => 'bg-danger',
                                            default => 'bg-warning text-dark',
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ ucfirst($supervisor->approval_status) }}</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('thesis-supervisors.edit', $supervisor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('thesis-supervisors.destroy', $supervisor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"> Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada data Pembimbing Tesis.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection