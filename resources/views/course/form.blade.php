@extends('layouts.app')

@section('content')
<div class="container py-3">
    <h3>{{ isset($course) ? 'Edit Mata Kuliah' : 'Tambah Mata Kuliah' }}</h3>

    <form action="{{ isset($course) ? route('course.update', $course->id) : route('course.store') }}" method="POST">
        @csrf
        @if(isset($course))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="course_code" class="form-label">Kode Mata Kuliah</label>
            <input id="course_code" name="course_code" type="text" class="form-control @error('course_code') is-invalid @enderror"
                   value="{{ old('course_code', $course->course_code ?? '') }}" required>
            @error('course_code') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Mata Kuliah</label>
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $course->name ?? '') }}" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="credits" class="form-label">Jumlah SKS</label>
            <input id="credits" name="credits" type="number" class="form-control @error('credits') is-invalid @enderror"
                   value="{{ old('credits', $course->credits ?? '') }}" required min="1">
            @error('credits') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="study_program_id" class="form-label">Program Studi</label>
            <select id="study_program_id" name="study_program_id" class="form-select @error('study_program_id') is-invalid @enderror" required>
                <option value="" disabled {{ old('study_program_id', $course->study_program_id ?? '') ? '' : 'selected' }}>-- Pilih Program Studi --</option>
                @foreach ($studyPrograms as $program)
                    <option value="{{ $program->id }}"
                        {{ old('study_program_id', $course->study_program_id ?? '') == $program->id ? 'selected' : '' }}
                    >
                        {{ $program->name }}
                    </option>
                @endforeach
            </select>
            @error('study_program_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($course) ? 'Update' : 'Simpan' }}</button>
        <a href="{{ route('course.index') }}" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>
@endsection