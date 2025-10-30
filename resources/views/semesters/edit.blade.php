@extends('layouts.app')

@section('title', 'Edit Data Semester Mahasiswa')

@section('content')
<div class="container mt-4">
    <h2>Edit Data Semester Mahasiswa</h2>

    <form action="{{ route('semesters.update', $semester->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="student_name" class="form-label">Nama Semester</label>
            <input type="text" name="student_name" id="student_name" class="form-control" 
                    value="{{ old('name', $semester->student_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="academic_year" class="form-label">Tahun Akademik / Angkatan</label>
            <input type="text" name="academic_year" id="academic_year" class="form-control"
                    placeholder="Contoh: 2022 / 2023"
                    value="{{ old('academic_year', $semester->academic_year) }}" required>
        </div>

        <div class="mb-3">
            <label for="order" class="form-label">Urutan Semester</label>
            <input type="number" name="order" id="order" class="form-control"
                    placeholder="Contoh: 1 untuk Semester 1"
                    value="{{ old('order', $semester->order) }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="1" {{ old('status', $semester->status) == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('status', $semester->status) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('semesters.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
