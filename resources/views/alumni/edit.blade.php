@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Data Alumni') }}</div>

                <div class="card-body">
                    <form action="{{ route('alumni.update', $alumnus->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Student --}}
                        <div class="form-group mb-3">
                            <label for="student_id" class="form-label">Student</label>
                            <select class="form-control @error('student_id') is-invalid @enderror" id="student_id" name="student_id" required>
                                <option value="">-- Pilih Student --</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}" {{ old('student_id', $alumnus->student_id) == $student->id ? 'selected' : '' }}>
                                        {{ $student->name }} ({{ $student->nim }})
                                    </option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Tahun Lulus --}}
                        <div class="form-group mb-3">
                            <label for="graduation_year" class="form-label">Tahun Lulus</label>
                            <input type="number" class="form-control @error('graduation_year') is-invalid @enderror" id="graduation_year" name="graduation_year" value="{{ old('graduation_year', $alumnus->graduation_year) }}" placeholder="Contoh: 2024" required>
                            @error('graduation_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Pekerjaan --}}
                        <div class="form-group mb-3">
                            <label for="occupation" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control @error('occupation') is-invalid @enderror" id="occupation" name="occupation" value="{{ old('occupation', $alumnus->occupation) }}" placeholder="Contoh: Software Engineer">
                            @error('occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Perusahaan --}}
                        <div class="form-group mb-3">
                            <label for="company" class="form-label">Perusahaan</label>
                            <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" value="{{ old('company', $alumnus->company) }}" placeholder="Contoh: Google">
                            @error('company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                            <a href="{{ route('alumni.index') }}" class="btn btn-secondary">
                                {{ __('Batal') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection