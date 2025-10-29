@extends('layouts.app') {{-- Pastikan ini merujuk ke layout utama Anda --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Tambah Biaya Kuliah Baru</h2>
                </div>

                <div class="card-body">
                    {{-- Form dikirim ke route store (POST) --}}
                    <form action="{{ route('tuition-fee.store') }}" method="POST">
                        @csrf
                        
                        {{-- 1. study_program_id (Foreign Key Dropdown) --}}
                        <div class="mb-3">
                            <label for="study_program_id" class="form-label">Program Studi</label>
                            <select class="form-control @error('study_program_id') is-invalid @enderror" id="study_program_id" name="study_program_id" required>
                                <option value="">Pilih Program Studi</option>
                                {{-- Loop data yang dikirim dari Controller --}}
                                @foreach ($studyPrograms as $program)
                                    <option value="{{ $program->id }}" {{ old('study_program_id') == $program->id ? 'selected' : '' }}>
                                        {{ $program->name }}
                                    </option>
                                @endforeach
                            </select>
                            {{-- Menampilkan error validasi dari Form Request --}}
                            @error('study_program_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 2. semester --}}
                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <input type="number" class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester" value="{{ old('semester') }}" required min="1" max="16">
                            @error('semester')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 3. amount --}}
                        <div class="mb-3">
                            <label for="amount" class="form-label">Jumlah Biaya (Rp)</label>
                            {{-- Menggunakan input type number dengan step untuk mempermudah --}}
                            <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" required min="100000" step="10000">
                            @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- 4. payment_type --}}
                        <div class="mb-3">
                            <label for="payment_type" class="form-label">Tipe Pembayaran</label>
                            <select class="form-control @error('payment_type') is-invalid @enderror" id="payment_type" name="payment_type" required>
                                <option value="">Pilih Tipe Pembayaran</option>
                                {{-- Anda bisa definisikan opsi sesuai kebutuhan bisnis --}}
                                @php $types = ['SPP', 'Uang Pangkal', 'Cicilan']; @endphp
                                @foreach ($types as $type)
                                    <option value="{{ $type }}" {{ old('payment_type') == $type ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                            @error('payment_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Simpan Biaya Kuliah</button>
                        <a href="{{ route('tuition-fee.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection