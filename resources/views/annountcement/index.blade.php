@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2 mb-0">Daftar Pengumuman</h1>
        <a href="{{ route('announcement.create') }}" 
            class="btn btn-primary">
            + Tambah Pengumuman
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="p-3">No</th>
                        <th scope="col" class="p-3">Judul</th>
                        <th scope="col" class="p-3">Tanggal</th>
                        <th scope="col" class="p-3">Pembuat</th>
                        <th scope="col" class="p-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($announcements as $announcement)
                        <tr>
                            <td class="p-3">{{ $loop->iteration }}</td>
                            <td class="p-3">{{ $announcement->title }}</td>
                            <td class="p-3">{{ \Carbon\Carbon::parse($announcement->date)->format('d M Y') }}</td>
                            <td class="p-3">{{ $announcement->user->name }}</td>
                            <td class="p-3 d-flex align-items-center">
                                <a href="{{ route('announcement.show', $announcement) }}" 
                                   class="btn btn-sm btn-info text-white me-2">Lihat</a>
                                <a href="{{ route('announcement.edit', $announcement) }}" 
                                   class="btn btn-sm btn-warning me-2">Edit</a>
                                <form action="{{ route('announcement.destroy', $announcement) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-3 text-muted">
                                Belum ada pengumuman
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($announcements->hasPages())
        <div class="mt-4">
            {{ $announcements->links() }}
        </div>
    @endif
</div>
@endsection