@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Daftar Fakultas</h1>
    <a href="{{ route('faculties.create') }}" class="btn btn-primary mb-3">Tambah Fakultas</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Fakultas</th>
                <th>Kode</th>
                <th>Dekan</th>
                <th>Universitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($faculties as $index => $faculty)
                <tr>
                    <td>{{ $index + $faculties->firstItem() }}</td>
                    <td>{{ $faculty->name }}</td>
                    <td>{{ $faculty->faculty_code }}</td>
                    <td>{{ $faculty->dean }}</td>
                    <td>{{ $faculty->university->name }}</td>
                    <td>
                        <form action="{{ route('faculties.destroy', $faculty->id) }}" method="POST">
                            <a href="{{ route('faculties.show', $faculty->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('faculties.edit', $faculty->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">Data Kosong.</td></tr>
            @endforelse
        </tbody>
    </table>
    {!! $faculties->links() !!}
</div>
@endsection