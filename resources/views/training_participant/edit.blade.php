@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Peserta Pelatihan: {{ $trainingParticipant->student->name ?? 'N/A' }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('training-participant.update', $trainingParticipant->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Field Mahasiswa --}}
                <div class="form-group mb-3">
                    <label for="student_id">Mahasiswa <span class="text-danger">*</span></label>
                    <select name="student_id" id="student_id" class="form-control @error('student_id') is-invalid @enderror" required>
                        <option value="">Pilih Mahasiswa</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}"
                                {{ old('student_id', $trainingParticipant->student_id) == $student->id ? 'selected' : '' }}>
                                {{ $student->nim }} - {{ $student->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('student_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                {{-- Field Pelatihan --}}
                <div class="form-group mb-3">
                    <label for="training_id">Pelatihan <span class="text-danger">*</span></label>
                    <select name="training_id" id="training_id" class="form-control @error('training_id') is-invalid @enderror" required>
                        <option value="">Pilih Pelatihan</option>
                        @foreach($trainings as $training)
                            <option value="{{ $training->id }}"
                                {{ old('training_id', $trainingParticipant->training_id) == $training->id ? 'selected' : '' }}>
                                {{ $training->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('training_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                {{-- Field Status Kehadiran --}}
                <div class="form-group mb-3">
                    <label for="attendance_status">Status Kehadiran <span class="text-danger">*</span></label>
                    <select name="attendance_status" id="attendance_status" class="form-control @error('attendance_status') is-invalid @enderror" required>
                        @php $currentStatus = old('attendance_status', $trainingParticipant->attendance_status); @endphp
                        <option value="Hadir" {{ $currentStatus == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="Absen" {{ $currentStatus == 'Absen' ? 'selected' : '' }}>Absen</option>
                        <option value="Izin" {{ $currentStatus == 'Izin' ? 'selected' : '' }}>Izin</option>
                    </select>
                    @error('attendance_status')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                {{-- Field Sertifikat --}}
                <div class="form-group mb-3">
                    <label for="certificate">Sertifikat (Nama File/Path)</label>
                    <input type="text" name="certificate" id="certificate" class="form-control @error('certificate') is-invalid @enderror"
                           value="{{ old('certificate', $trainingParticipant->certificate) }}" placeholder="Contoh: sertifikat_nama_pelatihan.pdf">
                    @error('certificate')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning mt-3">
                    <i class="fas fa-sync-alt"></i> Perbarui Data
                </button>
                <a href="{{ route('training-participant.index') }}" class="btn btn-secondary mt-3">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection