@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Skripsi
                        <a href="{{ route('theses.create') }}" class="btn btn-primary float-end">Tambah Skripsi</a>
                    </h4>
                </div>
                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
                                <th>Judul Skripsi</th>
                                <th>Status</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($theses as $thesis)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $thesis->student->name ?? 'N/A' }}</td> <td>{{ $thesis->title }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($thesis->status == 'completed') bg-success
                                            @elseif($thesis->status == 'in_progress') bg-info
                                            @elseif($thesis->status == 'proposed') bg-warning
                                            @else bg-danger
                                            @endif">
                                            {{ ucfirst(str_replace('_', ' ', $thesis->status)) }}
                                        </span>
                                    </td>
                                    <td>{{ $thesis->submission_date ? \Carbon\Carbon::parse($thesis->submission_date)->format('d-m-Y') : 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('theses.edit', $thesis->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        
                                        <form action="{{ route('theses.destroy', $thesis->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data skripsi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection