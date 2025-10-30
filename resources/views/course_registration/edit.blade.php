@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-success text-white text-center rounded-top-4 py-3">
            <h4 class="fw-bold mb-0">
                {{ isset($courseRegistration) ? 'Edit Data KRS' : 'Tambah Data KRS' }}
            </h4>
        </div>

        <div class="card-body bg-light">
            <form 
                action="{{ isset($courseRegistration) 
                    ? route('course-registration.update', $courseRegistration->id) 
                    : route('course-registration.store') }}" 
                method="POST"
            >
                @csrf
                @if(isset($courseRegistration))
                    @method('PUT')
                @endif

                {{-- REGISTRATION --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold text-success">Registration</label>
                    <select name="registration_id" class="form-select border-success rounded-3" required>
                        <option value="">-- Pilih Registration ID --</option>
                        @foreach($registrations as $r)
                            <option value="{{ $r->id }}" 
                                {{ (isset($courseRegistration) && $r->id == $courseRegistration->registration_id) ? 'selected' : '' }}>
                                {{ $r->id }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- CLASS --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold text-success">Class</label>
                    <select name="class_id" class="form-select border-success rounded-3" required>
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($classes as $c)
                            <option value="{{ $c->id }}" 
                                {{ (isset($courseRegistration) && $c->id == $courseRegistration->class_id) ? 'selected' : '' }}>
                                {{ $c->class_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- TANGGAL --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold text-success">Tanggal Registrasi</label>
                    <input type="date" name="registration_date" 
                        class="form-control border-success rounded-3"
                        value="{{ old('registration_date', $courseRegistration->registration_date ?? '') }}" required>
                </div>

                {{-- STATUS --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold text-success">Status Validasi</label>
                    <select name="validation_status" class="form-select border-success rounded-3" required>
                        @foreach(['pending','approved','rejected'] as $status)
                            <option value="{{ $status }}" 
                                {{ (isset($courseRegistration) && $status == $courseRegistration->validation_status) ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- BUTTONS --}}
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('course-registration.index') }}" class="btn btn-outline-success px-4 rounded-3">
                        ← Kembali
                    </a>
                    <button type="submit" class="btn btn-success px-5 rounded-3">
                        {{ isset($courseRegistration) ? 'Update' : 'Simpan' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection