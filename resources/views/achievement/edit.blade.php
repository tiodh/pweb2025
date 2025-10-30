@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Prestasi</h1>

    <form action="{{ route('achievement.update', $achievement->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="student_id" class="form-label">ID Mahasiswa</label>
            <input type="text" name="student_id" id="student_id" class="form-control" value="{{ $achievement->student_id }}">
        </div>

        <div class="mb-3">
            <label for="achievement_name" class="form-label">Nama Prestasi</label>
            <input type="text" name="achievement_name" id="achievement_name" class="form-control" value="{{ $achievement->achievement_name }}">
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Tingkat</label>
            <input type="text" name="level" id="level" class="form-control" value="{{ $achievement->level }}">
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Tahun</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ $achievement->year }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('achievement.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
