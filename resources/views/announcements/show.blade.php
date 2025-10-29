@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2 mb-0">Detail Pengumuman</h1>
        <a href="{{ route('announcements.index') }}" 
            class="btn btn-secondary">
            ← Kembali ke Daftar
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title h3 mb-4">{{ $announcement->title }}</h2>
            
            <div class="text-muted mb-3">
                <p class="mb-1">Tanggal Terbit: <strong>{{ \Carbon\Carbon::parse($announcement->date)->format('d F Y') }}</strong></p>
                <p class="mb-0">Dibuat oleh: <strong>{{ $announcement->user->name }}</strong></p>
            </div>

            <hr>

            <div class="mt-4">
                <p class="card-text">{{ nl2br(e($announcement->content)) }}</p> 
            </div>

            <div class="mt-4 pt-3 border-top">
                <a href="{{ route('announcements.edit', $announcement) }}" 
                    class="btn btn-warning me-2">
                    Edit
                </a>
                <form action="{{ route('announcements.destroy', $announcement) }}" 
                        method="POST"
                        class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="btn btn-danger">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
