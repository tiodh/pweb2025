@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Data Semester Mahasiswa</h2>

    <form action="{{ route('semesters.store') }}" method="POST">
        @csrf

        {{-- Nama Mahasiswa --}}
        <div class="mb-3">
            <label for="student_name" class="form-label">Nama Semester</label>
            <input type="text" name="student_name" id="student_name" class="form-control"
                    placeholder="Masukkan nama semester" required>
        </div>

        {{-- Tahun Akademik / Angkatan --}}
        <div class="mb-3">
            <label for="academic_year" class="form-label">Tahun Akademik / Angkatan</label>
            <input type="text" name="academic_year" id="academic_year" class="form-control"
                    placeholder="Contoh: 2022 / 2023" required>
        </div>

        {{-- Urutan Semester --}}
        <div class="mb-3">
            <label for="order" class="form-label">Urutan Semester</label>
            <input type="number" name="order" id="order" class="form-control"
                    placeholder="Contoh: 1 untuk Semester 1" min="1" required>
        </div>

        {{-- Status Aktif --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('semesters.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection
