@extends('layouts.scholarships')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" data-aos="fade-up">
                <div class="card-header">
                    <h5>
                        <i class="fas fa-edit"></i> Edit Beasiswa
                    </h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('scholarships.update', $scholarship->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Beasiswa</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $scholarship->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="provider" class="form-label">Penyedia</label>
                            <input type="text" class="form-control @error('provider') is-invalid @enderror" id="provider" name="provider" value="{{ old('provider', $scholarship->provider) }}" required>
                            @error('provider')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Jenis Beasiswa</label>
                            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                @php
                                    $options = ['Akademik', 'Non-Akademik', 'Prestasi', 'Soft Skill', 'Lainnya'];
                                    $currentValue = old('type', $scholarship->type);
                                @endphp

                                <option value="" disabled {{ !in_array($currentValue, $options) ? 'selected' : '' }}>
                                    -- Data lama tidak valid, harap pilih lagi --
                                </option>

                                @foreach ($options as $option)
                                    <option value="{{ $option }}" {{ $currentValue == $option ? 'selected' : '' }}>
                                        {{ $option }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="period" class="form-label">Periode (Tahun)</label>
                            <input type="number" class="form-control @error('period') is-invalid @enderror" id="period" name="period" value="{{ old('period', $scholarship->period) }}" min="2020" required>
                            @error('period')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update
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