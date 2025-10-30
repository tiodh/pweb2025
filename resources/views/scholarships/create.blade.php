@extends('layouts.scholarships')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" data-aos="fade-up">
                <div class="card-header">
                    <h5>
                        <i class="fas fa-plus-circle"></i> Tambah Beasiswa Baru
                    </h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('scholarships.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Beasiswa</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Contoh: Beasiswa Bank Indonesia" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="provider" class="form-label">Penyedia</label>
                            <input type="text" class="form-control @error('provider') is-invalid @enderror" id="provider" name="provider" value="{{ old('provider') }}" placeholder="Contoh: Djarum Foundation" required>
                            @error('provider')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Jenis Beasiswa</label>
                            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                <option value="" selected disabled>-- Pilih Jenis --</option>
                                <option value="Akademik" {{ old('type') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                                <option value="Non-Akademik" {{ old('type') == 'Non-Akademik' ? 'selected' : '' }}>Non-Akademik</option>
                                <option value="Prestasi" {{ old('type') == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                                <option value="Soft Skill" {{ old('type') == 'Soft Skill' ? 'selected' : '' }}>Soft Skill</option>
                                <option value="Lainnya" {{ old('type') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="period" class="form-label">Periode (Tahun)</label>
                            <input type="number" class="form-control @error('period') is-invalid @enderror" id="period" name="period" value="{{ old('period') }}" placeholder="Contoh: 2025" min="2020" required>
                            @error('period')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('scholarships.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection