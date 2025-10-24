@extends('layouts.academic_years')

@section('content')
<div class="container mt-4">
    <h2>Tambah Tahun Akademik</h2>
    <form action="{{ route('academic-years.store') }}" method="POST" class="mt-3">
        @csrf
        <div class="mb-3">
            <label for="start_year" class="form-label">Tahun Mulai</label>
            <input type="number" name="start_year" class="form-control" value="{{ old('start_year') }}">
        </div>
        <div class="mb-3">
            <label for="end_year" class="form-label">Tahun Selesai</label>
            <input type="number" name="end_year" class="form-control" value="{{ old('end_year') }}">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="active_status" value="1" class="form-check-input" {{ old('active_status') ? 'checked' : '' }}>
            <label class="form-check-label">Aktifkan</label>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Catatan</label>
            <textarea name="notes" class="form-control">{{ old('notes') }}</textarea>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('academic-years.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
