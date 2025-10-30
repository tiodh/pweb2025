@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- HEADER: Judul Halaman dan Tombol Kembali --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h3 mb-0">Edit Akun Mahasiswa</h1>
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

            {{-- KONTEN: Form Edit Data --}}
            <form action="{{ route('student_accounts.update', $studentAccount) }}" method="POST" class="card shadow-sm border-0">
                @csrf
                @method('PUT') {{-- PENTING --}}

                <div class="card-body p-4">
                    {{-- Dropdown User --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="user_id">User (Login)</label>
                        <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror">
                            <option value="">-- Pilih User --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ old('user_id', $studentAccount->user_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Dropdown Student --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="student_id">Profil Mahasiswa (Student)</label>
                        <select name="student_id" id="student_id" class="form-select @error('student_id') is-invalid @enderror">
                            <option value="">-- Pilih Mahasiswa --</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}"
                                    {{ old('student_id', $studentAccount->student_id) == $student->id ? 'selected' : '' }}>
                                    {{ $student->name }} ({{ $student->nim }})
                                </option>
                            @endforeach
                        </select>
                        @error('student_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Dropdown Status --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="status">Status</label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="active" {{ old('status', $studentAccount->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $studentAccount->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="suspended" {{ old('status', $studentAccount->status) == 'suspended' ? 'selected' : '' }}>Suspended</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Input Last Login --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold" for="last_login">Login Terakhir (Opsional)</label>
                        <input type="datetime-local" name="last_login" id="last_login"
                               value="{{ old('last_login', $studentAccount->last_login?->format('Y-m-d\TH:i')) }}"
                               class="form-control @error('last_login') is-invalid @enderror">
                        @error('last_login')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Tombol Submit --}}
                <div class="card-footer bg-light border-0 text-end">
                    <button type="submit" class="btn btn-primary shadow-sm">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
