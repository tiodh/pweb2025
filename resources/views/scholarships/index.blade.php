@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Manajemen Beasiswa
                    <a href="{{ route('scholarships.create') }}" class="btn btn-primary btn-sm float-end">Tambah Beasiswa</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
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
                                            <a href="{{ route('scholarships.edit', $scholarship->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus?')">Hapus</button>
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
