@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Prestasi Mahasiswa</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($achievements->isEmpty())
        <p>Tidak ada data prestasi.</p>
    @else
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Prestasi</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>ID Mahasiswa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($achievements as $achievement)
                    <tr>
                        <td>{{ $achievement->id }}</td>
                        <td>{{ $achievement->title }}</td>
                        <td>{{ $achievement->description }}</td>
                        <td>{{ $achievement->date }}</td>
                        <td>{{ $achievement->student_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('achievement.create') }}" class="btn btn-primary">Tambah Prestasi</a>
</div>
@endsection
