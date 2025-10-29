@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- DIUBAH: Judul Kartu --}}
                <div class="card-header">Edit Department</div>

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

                    {{-- DIUBAH: Form action dan method --}}
                    <form method="POST" action="{{ route('departments.update', $department->id) }}">
                        @method('PUT') {{-- DITAMBAHKAN: Method spoofing for UPDATE --}}
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="faculty_id" class="col-md-4 col-form-label text-md-right">Faculty</label>
                            <div class="col-md-6">
                                <select id="faculty_id" name="faculty_id" class="form-control @error('faculty_id') is-invalid @enderror" required>
                                    <option value="">-- Select Faculty --</option>

                                    @isset($faculties)
                                        @forelse ($faculties as $faculty)
                                            @if(is_object($faculty))
                                                {{-- DIUBAH: Logika 'selected' untuk menampilkan data yang ada --}}
                                                <option value="{{ $faculty->id }}" 
                                                    {{ (old('faculty_id', $department->faculty_id) == $faculty->id) ? 'selected' : '' }}>
                                                    {{ $faculty->name }}
                                                </option>
                                            @endif
                                        @empty
                                            <option value="" disabled>No faculties available</option> 
                                        @endforelse
                                    @else
                                        <option value="" disabled>Faculty data not loaded</option> 
                                    @endisset

                                </select>

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
                                {{-- DIUBAH: Tambahkan value dari $department --}}
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required 
                                       value="{{ old('name', $department->name) }}">
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
                                {{-- DIUBAH: Tambahkan value dari $department --}}
                                <input id="department_code" type="text" class="form-control @error('department_code') is-invalid @enderror" name="department_code" required 
                                       value="{{ old('department_code', $department->department_code) }}">
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
                                {{-- DIUBAH: Tambahkan value dari $department --}}
                                <input id="head_of_department" type="text" class="form-control @error('head_of_department') is-invalid @enderror" name="head_of_department" required 
                                       value="{{ old('head_of_department', $department->head_of_department) }}">
                                 @error('head_of_department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{-- DIUBAH: Teks Tombol --}}
                                <button type="submit" class="btn btn-primary">
                                    Update Department
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