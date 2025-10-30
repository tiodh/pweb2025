@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Edit Nilai Mahasiswa</h2>

    <form action="{{ route('grade.update', $grade->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">ID KRS</label>
            <input type="number" name="course_registration_id" value="{{ $grade->course_registration_id }}" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Nilai Angka</label>
            <input type="number" step="0.01" name="numeric_grade" value="{{ $grade->numeric_grade }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nilai Huruf</label>
            <input type="text" name="letter_grade" value="{{ $grade->letter_grade }}" class="form-control" maxlength="3" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Input</label>
            <input type="date" name="input_date" value="{{ $grade->input_date }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('grade.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
