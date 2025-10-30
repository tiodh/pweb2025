@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Tambah Nilai Mahasiswa</h2>

    <form action="{{ route('grade.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">ID KRS</label>
            <input type="number" name="course_registration_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nilai Angka</label>
            <input type="number" step="0.01" name="numeric_grade" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nilai Huruf</label>
            <input type="text" name="letter_grade" class="form-control" maxlength="3" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Input</label>
            <input type="date" name="input_date" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('grade.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
