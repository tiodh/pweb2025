@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="h2 mb-4">Edit Pengumuman</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('announcement.update', $announcement) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3"> 
                    <label for="title" class="form-label font-weight-bold">Judul</label>
                    <input type="text" 
                            name="title" 
                            value="{{ old('title', $announcement->title) }}"
                            class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label font-weight-bold">Tanggal</label>
                    <input type="date" 
                            name="date" 
                            value="{{ old('date', \Carbon\Carbon::parse($announcement->date)->format('Y-m-d')) }}" {{-- Memastikan format tanggal Y-m-d --}}
                            class="form-control @error('date') is-invalid @enderror">
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="content" class="form-label font-weight-bold">Konten</label>
                    <textarea name="content" 
                                rows="6"
                                class="form-control @error('content') is-invalid @enderror">{{ old('content', $announcement->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" 
                            class="btn btn-primary">
                        Perbarui
                    </button>
                    <a href="{{ route('announcement.index') }}" 
                        class="btn btn-link text-muted">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection