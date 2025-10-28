@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h3 class="fw-bold mb-4">✏️ Edit Study Program</h3>
    <form action="{{ route('study-programs.update', $program->id) }}" method="POST" class="card p-4 shadow-sm border-0">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Department</label>
            <select name="department_id" class="form-select" required>
                @foreach($departments as $dept)
                    <option value="{{ $dept->id }}" {{ $program->department_id == $dept->id ? 'selected' : '' }}>
                        {{ $dept->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Program Name</label>
            <input type="text" name="name" value="{{ $program->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Degree Level</label>
            <input type="text" name="degree_level" value="{{ $program->degree_level }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Accreditation</label>
            <input type="text" name="accreditation" value="{{ $program->accreditation }}" class="form-control">
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('study-programs.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
            <button type="submit" class="btn btn-primary">💾 Update</button>
        </div>
    </form>
</div>
@endsection