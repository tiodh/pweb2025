@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Skripsi</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('theses.update', $thesis->id) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="mb-3">
                            <label for="student_id" class="form-label">Mahasiswa</label>
                            <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" name="student_id">
                                <option value="">Pilih Mahasiswa</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}" {{ old('student_id', $thesis->student_id) == $student->id ? 'selected' : '' }}>
                                        {{ $student->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Skripsi</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $thesis->title) }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class_mb-3>
                            <label for="abstract" class="form-label">Abstrak</label>
                            <textarea class="form-control @error('abstract') is-invalid @enderror" id="abstract" name="abstract" rows="4">{{ old('abstract', $thesis->abstract) }}</textarea>
                            @error('abstract')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="proposed" {{ old('status', $thesis->status) == 'proposed' ? 'selected' : '' }}>Proposed</option>
                                <option value="in_progress" {{ old('status', $thesis->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ old('status', $thesis->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="failed" {{ old('status', $thesis->status) == 'failed' ? 'selected' : '' }}>Failed</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="submission_date" class="form-label">Tanggal Pengajuan</label>
                            <input type="date" class="form-control @error('submission_date') is-invalid @enderror" id="submission_date" name="submission_date" value="{{ old('submission_date', $thesis->submission_date) }}">
                            @error('submission_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('theses.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection