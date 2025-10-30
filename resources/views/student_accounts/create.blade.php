@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8"> {{-- Lebar standar untuk form --}}

            {{-- HEADER: Judul Halaman dan Tombol Kembali --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h3 mb-0">Tambah Akun Mahasiswa Baru</h1>
                <a href="{{ route('student_accounts.index') }}" class="btn btn-secondary shadow-sm">
                    &larr; Kembali
                </a>
            </div>

            {{-- Menampilkan Error Validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger shadow-sm" role="alert">
                    <strong class="fw-bold">Oops! Ada yang salah:</strong>
                    <ul class="mt-2 mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- KONTEN: Form Tambah Data --}}
            <form action="{{ route('student_accounts.store') }}" method="POST" class="card shadow-sm border-0">
                @csrf
                <div class="card-body p-4">
                    {{-- Dropdown User --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="user_id">User (Login)</label>
                        <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror">
                            <option value="">-- Pilih User --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if($users->isEmpty() && !$errors->has('user_id'))
                            <small class="form-text text-warning">Semua user 'student' sudah memiliki akun.</small>
                        @endif
                    </div>

                    {{-- Dropdown Student --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="student_id">Profil Mahasiswa (Student)</label>
                        <select name="student_id" id="student_id" class="form-select @error('student_id') is-invalid @enderror">
                            <option value="">-- Pilih Mahasiswa --</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                    {{ $student->name }} ({{ $student->nim }})
                                </option>
                            @endforeach
                        </select>
                        @error('student_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if($students->isEmpty() && !$errors->has('student_id'))
                            <small class="form-text text-warning">Semua data 'student' sudah memiliki akun.</small>
                        @endif
                    </div>

                    {{-- Dropdown Status --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="status">Status</label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="suspended" {{ old('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input Last Login (Opsional) --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="last_login">Login Terakhir (Opsional)</label>
                        <input type="datetime-local" name="last_login" id="last_login" value="{{ old('last_login') }}"
                               class="form-control @error('last_login') is-invalid @enderror">
                        @error('last_login')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Tombol Submit --}}
                <div class="card-footer bg-light border-0 text-end">
                    <button type="submit" class="btn btn-primary shadow-sm">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
