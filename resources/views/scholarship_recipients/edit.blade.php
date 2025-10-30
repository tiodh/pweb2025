@extends('layouts.app')

@section('title', 'Edit Penerima Beasiswa')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <h2>Edit Data Penerima Beasiswa</h2>
            <hr>

            <a href="{{ route('scholarship_recipients.index') }}" class="btn btn-secondary mb-3">
                &laquo; Kembali
            </a>

            <div class="card shadow-sm">
                <div class="card-body">
                    {{--
                    --}}
                    <form action="{{ route('scholarship_recipients.update', $scholarshipRecipient->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="student_id" class="form-label">Mahasiswa</label>
                            <select class="form-select @error('student_id') is-invalid @enderror" id="student_id" name="student_id">
                                <option value="" disabled>-- Pilih Mahasiswa --</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}"{{-- Cek apakah student ini adalah student yang tersimpan --}}
                                        {{ old('student_id', $scholarshipRecipient->student_id) == $student->id ? 'selected' : '' }}>

                                        {{ $student->name }} (NIM: {{ $student->nim ?? 'N/A' }})
                                    </option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="scholarship_id" class="form-label">Jenis Beasiswa</label>
                            <select class="form-select @error('scholarship_id') is-invalid @enderror" id="scholarship_id" name="scholarship_id">
                                <option value="" disabled>-- Pilih Beasiswa --</option>
                                @foreach ($scholarships as $scholarship)
                                    <option value="{{ $scholarship->id }}"
                                        {{ old('scholarship_id', $scholarshipRecipient->scholarship_id) == $scholarship->id ? 'selected' : '' }}>

                                        {{ $scholarship->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('scholarship_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="year" class="form-label">Tahun</label>
                            <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year"
                                    placeholder="Contoh: 2024"
                                    value="{{ old('year', $scholarshipRecipient->year) }}">
                            @error('year')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                @php $statuses = ['active', 'inactive', 'graduated']; @endphp
                                @foreach ($statuses as $status)
                                    <option value="{{ $status }}"
                                        {{ old('status', $scholarshipRecipient->status) == $status ? 'selected' : '' }}>

                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection