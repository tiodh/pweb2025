@extends('layouts.app')

@section('title', 'Daftar Semester Mahasiswa')

@section('content')
<div class="container mt-4">
    <h2>Daftar Semester Mahasiswa</h2>
    <a href="{{ route('semesters.create') }}" class="btn btn-primary mb-3">Tambah Data Semester</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Mahasiswa</th>
                <th>Tahun Akademik / Angkatan</th>
                <th>Urutan Semester</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($semesters as $semester)
                <tr>
                    <td>{{ $semester->student_name }}</td>
                    <td>{{ $semester->academic_year }}</td>
                    <td>{{ $semester->order }}</td>
                    <td>
                        {{ $semester->status ? 'Aktif' : 'Tidak Aktif' }}
                    </td>
                    <td>
                        <a href="{{ route('semesters.edit', $semester->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('semesters.destroy', $semester->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus semester ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data semester</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
