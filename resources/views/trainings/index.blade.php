@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            {{-- Menampilkan notifikasi sukses --}}
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Daftar Training</h2>
                    <a href="{{ route('trainings.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus"></i> Tambah Baru
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Pelatihan</th>
                                    <th>Penyelenggara</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th style="width: 200px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($trainings as $training)
                                    <tr>
                                        <td>{{ $training->name }}</td>
                                        <td>{{ $training->provider }}</td>
                                        <td>{{ $training->start_date->format('d M Y, H:i') }}</td>
                                        <td>{{ $training->end_date->format('d M Y, H:i') }}</td>
                                        <td>
                                            <a href="{{ route('trainings.show', $training) }}" class="btn btn-sm btn-info text-white">Lihat</a>
                                            <a href="{{ route('trainings.edit', $training) }}" class="btn btn-sm btn-warning">Edit</a>
                                            
                                            <form action="{{ route('trainings.destroy', $training) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" 
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Link Paginasi (otomatis ter-style oleh Bootstrap) --}}
                    <div class="d-flex justify-content-center">
                        {{ $trainings->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection