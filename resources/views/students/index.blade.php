@extends('layouts.app')
@section('content')
<div class="container py-4">
    <h2 class="fw-bold text-primary mb-4">🎓 Data Mahasiswa</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('students.create') }}" class="btn btn-success">➕ Tambah Mahasiswa</a>
    </div>
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-primary text-center">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Angkatan</th>
                <th>Program Studi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $index => $student)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $student->nim }}</td>
                    <td>{{ $student->name }}</td>
                    <td class="text-center">{{ $student->cohort_year }}</td>
                    <td>{{ $student->studyProgram->name ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection