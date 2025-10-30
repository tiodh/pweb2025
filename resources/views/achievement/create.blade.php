@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Prestasi</h2>
    <form action="{{ route('achievement.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul Prestasi</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>

        <div class="mb-3">
            <label for="student_id" class="form-label">ID Mahasiswa</label>
            <input type="number" name="student_id" id="student_id" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
