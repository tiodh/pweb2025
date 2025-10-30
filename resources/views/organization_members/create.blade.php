@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Tambah Anggota Organisasi</h2>

    <a href="{{ route('organization_members.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Perhatian!</strong> Ada kesalahan pada input:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('organization_members.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="organization_id" class="form-label">Organization</label>
            <select name="organization_id" id="organization_id" class="form-select" required>
                <option value="">-- Pilih Organisasi --</option>
                @foreach($organizations as $organization)
                    <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="student_id" class="form-label">Student</label>
            <select name="student_id" id="student_id" class="form-select" required>
                <option value="">-- Pilih Mahasiswa --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <input type="text" name="position" class="form-control" placeholder="Contoh: Ketua" required>
        </div>

        <div class="mb-3">
            <label for="period" class="form-label">Period</label>
            <input type="text" name="period" class="form-control" placeholder="Contoh: 2024-2025" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
