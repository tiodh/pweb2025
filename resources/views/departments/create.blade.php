@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Department</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('departments.store') }}">
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="faculty_id" class="col-md-4 col-form-label text-md-right">Faculty</label>
                            <div class="col-md-6">
                                <select id="faculty_id" name="faculty_id" class="form-control @error('faculty_id') is-invalid @enderror" required>
                                    <option value="">-- Select Faculty --</option>

                                    {{-- Hanya looping jika $faculties ada dan tidak kosong --}}
                                    @isset($faculties)
                                        @forelse ($faculties as $faculty)
                                            {{-- Pastikan $faculty adalah objek sebelum mengakses propertinya --}}
                                            @if(is_object($faculty))
                                                <option value="{{ $faculty->id }}" {{ old('faculty_id') == $faculty->id ? 'selected' : '' }}>
                                                    {{ $faculty->name }}
                                                </option>
                                            @endif
                                        @empty
                                            {{-- Tampilkan opsi sementara jika $faculties kosong --}}
                                            <option value="1">Testing Faculty 1 (Sementara)</option> 
                                            <option value="2">Testing Faculty 2 (Sementara)</option> 
                                        @endforelse
                                    @else
                                        {{-- Tampilkan opsi sementara jika $faculties tidak ada sama sekali --}}
                                        <option value="1">Testing Faculty 1 (Sementara)</option> 
                                        <option value="2">Testing Faculty 2 (Sementara)</option> 
                                    @endisset

                                </select>

                                {{-- Tampilkan pesan error validasi untuk faculty_id --}}
                                @error('faculty_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Department Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required value="{{ old('name') }}">
                                 @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="department_code" class="col-md-4 col-form-label text-md-right">Department Code</label>
                            <div class="col-md-6">
                                <input id="department_code" type="text" class="form-control @error('department_code') is-invalid @enderror" name="department_code" required value="{{ old('department_code') }}">
                                 @error('department_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="head_of_department" class="col-md-4 col-form-label text-md-right">Head of Department</label>
                            <div class="col-md-6">
                                <input id="head_of_department" type="text" class="form-control @error('head_of_department') is-invalid @enderror" name="head_of_department" required value="{{ old('head_of_department') }}">
                                 @error('head_of_department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Department
                                </button>
                                <a href="{{ route('departments.index') }}" class="btn btn-secondary">
                                    Back
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection