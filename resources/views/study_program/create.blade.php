@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h3 class="fw-bold mb-4">➕ Tambah Study Program</h3>
    <form action="{{ route('study-programs.store') }}" method="POST" class="card p-4 shadow-sm border-0">
        @csrf
        <div class="mb-3">
            <label class="form-label">Department</label>
            <select name="department_id" class="form-select" required>
                <option value="">-- Pilih Department --</option>
                @foreach($departments as $dept)
                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Program Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Degree Level</label>
            <input type="text" name="degree_level" class="form-control" placeholder="S1, D3, D4, dsb" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Accreditation</label>
            <input type="text" name="accreditation" class="form-control" placeholder="A / B / C">
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('study-programs.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
            <button type="submit" class="btn btn-success">💾 Simpan</button>
        </div>
    </form>
</div>
@endsection