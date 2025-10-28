@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-success mb-4">➕ Tambah Mahasiswa</h2>
    <form action="{{ route('students.store') }}" method="POST" class="card p-4 shadow-sm border-0">
        @csrf
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" value="{{ old('nim') }}" required>
            @error('nim') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label for="cohort_year" class="form-label">Tahun Angkatan</label>
            <input type="number" name="cohort_year" class="form-control" value="{{ old('cohort_year') }}" required>
            @error('cohort_year') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label for="study_program_id" class="form-label">Program Studi</label>
            <select name="study_program_id" class="form-select" required>
                <option value="">-- Pilih Program Studi --</option>
                @foreach($programs as $program)
                    <option value="{{ $program->id }}" {{ old('study_program_id') == $program->id ? 'selected' : '' }}>
                        {{ $program->name }}
                    </option>
                @endforeach
            </select>
            @error('study_program_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('students.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
            <button type="submit" class="btn btn-success">💾 Simpan</button>
        </div>
    </form>
</div>
@endsection