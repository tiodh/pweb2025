@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Tambah Fakultas Baru</h1>
    <form action="{{ route('faculties.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Nama Fakultas</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group mb-3">
            <label for="faculty_code">Kode Fakultas</label>
            <input type="text" class="form-control @error('faculty_code') is-invalid @enderror" id="faculty_code" name="faculty_code" value="{{ old('faculty_code') }}">
            @error('faculty_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group mb-3">
            <label for="dean">Dekan</label>
            <input type="text" class="form-control @error('dean') is-invalid @enderror" id="dean" name="dean" value="{{ old('dean') }}">
            @error('dean')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="form-group mb-3">
            <label for="university_id">Universitas</label>
            <select class="form-control @error('university_id') is-invalid @enderror" id="university_id" name="university_id">
                <option value="">Pilih Universitas</option>
                @foreach ($universities as $university)
                    <option value="{{ $university->id }}" {{ old('university_id') == $university->id ? 'selected' : '' }}>{{ $university->name }}</option>
                @endforeach
            </select>
            @error('university_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('faculties.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection