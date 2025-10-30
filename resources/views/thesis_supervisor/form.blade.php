@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="fw-bold mb-4">
        {{ isset($supervisor) ? 'Edit Pembimbing Tesis' : 'Tambah Pembimbing Tesis' }}
    </h3>
    <form action="{{ isset($supervisor) ? route('thesis-supervisors.update', $supervisor->id) : route('thesis-supervisors.store') }}" method="POST" class="card p-4 shadow-sm border-0">
        @csrf
        @if(isset($supervisor))
            @method('PUT')
        @endif
        
        {{-- THESIS ID --}}
        <div class="mb-3">
            <label for="thesis_id" class="form-label">Tesis/Skripsi <span class="text-danger">*</span></label>
            <select name="thesis_id" id="thesis_id" class="form-select @error('thesis_id') is-invalid @enderror" required>
                <option value="">-- Pilih Tesis --</option>
                @foreach($theses as $thesis)
                    <option value="{{ $thesis->id }}" 
                        {{ old('thesis_id', $supervisor->thesis_id ?? '') == $thesis->id ? 'selected' : '' }}>
                        {{ $thesis->title }} (ID: {{ $thesis->id }})
                    </option>
                @endforeach
            </select>
            @error('thesis_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        {{-- LECTURER ID --}}
        <div class="mb-3">
            <label for="lecturer_id" class="form-label">Dosen Pembimbing <span class="text-danger">*</span></label>
            <select name="lecturer_id" id="lecturer_id" class="form-select @error('lecturer_id') is-invalid @enderror" required>
                <option value="">-- Pilih Dosen --</option>
                @foreach($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}" 
                        {{ old('lecturer_id', $supervisor->lecturer_id ?? '') == $lecturer->id ? 'selected' : '' }}>
                        {{ $lecturer->name }} (NIP: {{ $lecturer->nip ?? $lecturer->id }})
                    </option>
                @endforeach
            </select>
            @error('lecturer_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        {{-- ROLE --}}
        <div class="mb-3">
            <label for="role" class="form-label">Peran (Role) <span class="text-danger">*</span></label>
            <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                @php 
                    $currentRole = old('role', $supervisor->role ?? '');
                @endphp
                <option value="">-- Pilih Peran --</option>
                <option value="Pembimbing Utama" {{ $currentRole == 'Pembimbing Utama' ? 'selected' : '' }}>Pembimbing Utama</option>
                <option value="Pembimbing Pendamping" {{ $currentRole == 'Pembimbing Pendamping' ? 'selected' : '' }}>Pembimbing Pendamping</option>
            </select>
            @error('role') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        {{-- APPROVAL STATUS --}}
        <div class="mb-3">
            <label for="approval_status" class="form-label">Status Persetujuan <span class="text-danger">*</span></label>
            <select name="approval_status" id="approval_status" class="form-select @error('approval_status') is-invalid @enderror" required>
                @php 
                    $currentStatus = old('approval_status', $supervisor->approval_status ?? 'pending');
                @endphp
                <option value="pending" {{ $currentStatus == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $currentStatus == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $currentStatus == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
            @error('approval_status') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        {{-- BUTTONS --}}
        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('thesis-supervisors.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">
                {{ isset($supervisor) ? 'Update' : ' Simpan' }}
            </button>
        </div>
    </form>
</div>
@endsection