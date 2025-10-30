@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-primary">📘 Study Programs</h2>
        <a href="{{ route('study-programs.create') }}" class="btn btn-success">➕ Tambah Program</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <table class="table table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Department</th>
                        <th>Name</th>
                        <th>Degree</th>
                        <th>Accreditation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($programs as $program)
                        <tr>
                            <td>{{ $program->id }}</td>
                            <td>{{ $program->department->name ?? 'N/A' }}</td>
                            <td>{{ $program->name }}</td>
                            <td>{{ $program->degree_level }}</td>
                            <td>{{ $program->accreditation ?? '-' }}</td>
                            <td>
                                <a href="{{ route('study-programs.edit', $program->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                                <form action="{{ route('study-programs.destroy', $program->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">🗑️ Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($programs->isEmpty())
                        <tr><td colspan="6" class="text-muted">Belum ada data.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection