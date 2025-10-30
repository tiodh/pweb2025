@extends('layouts.scholarships')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Tambahkan animasi AOS di sini -->
            <div class="card" data-aos="fade-up">
                <div class="card-header">
                    <h5>
                        <!-- Tambahkan ikon di judul -->
                        <i class="fas fa-graduation-cap"></i> Manajemen Beasiswa
                    </h5>
                </div>

                <div class="card-body">
                    <a href="{{ route('scholarships.create') }}" class="btn btn-primary mb-3">
                        <i class="fas fa-plus"></i> Tambah Beasiswa
                    </a>

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tambahkan table-hover agar lebih interaktif -->
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nama Beasiswa</th>
                                <th>Penyedia</th>
                                <th>Jenis</th>
                                <th>Periode</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($scholarships as $scholarship)
                                <tr>
                                    <td>{{ $scholarship->id }}</td>
                                    <td>{{ $scholarship->name }}</td>
                                    <td>{{ $scholarship->provider }}</td>
                                    <td>{{ $scholarship->type }}</td>
                                    <td>{{ $scholarship->period }}</td>
                                    <td>
                                        <form action="{{ route('scholarships.destroy', $scholarship->id) }}" method="POST">
                                            <a href="{{ route('scholarships.edit', $scholarship->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data beasiswa masih kosong.</td>
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