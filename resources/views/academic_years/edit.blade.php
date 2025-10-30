@extends('layouts.academic_years')

@section('content')
<div class="container mt-4">
    <h2>Edit Tahun Akademik</h2>
    <form action="{{ route('academic-years.update', $academic_year->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="start_year" class="form-label">Tahun Mulai</label>
            <input type="number" name="start_year" class="form-control" value="{{ old('start_year', $academic_year->start_year) }}">
            @error('start_year')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="end_year" class="form-label">Tahun Selesai</label>
            <input type="number" name="end_year" class="form-control" value="{{ old('end_year', $academic_year->end_year) }}">
            @error('end_year')
                <small class="text-danger">{{ $message }}</small>
            @enderror  
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="active_status" value="1" class="form-check-input" {{ $academic_year->active_status ? 'checked' : '' }}>
            <label class="form-check-label">Aktifkan</label>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Catatan</label>
            <textarea name="notes" class="form-control">{{ old('notes', $academic_year->notes) }}</textarea>
            @error('notes')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('academic-years.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
