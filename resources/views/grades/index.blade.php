@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Daftar Nilai Mahasiswa</h2>

    <a href="{{ route('grade.create') }}" class="btn btn-primary mb-3">+ Tambah Nilai</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>ID KRS</th>
                <th>Nilai Angka</th>
                <th>Nilai Huruf</th>
                <th>Tanggal Input</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($grades as $key => $grade)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $grade->course_registration_id }}</td>
                    <td>{{ $grade->numeric_grade }}</td>
                    <td>{{ $grade->letter_grade }}</td>
                    <td>{{ $grade->input_date }}</td>
                    <td>
                        <a href="{{ route('grade.edit', $grade->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('grade.destroy', $grade->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">Belum ada data nilai</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $grades->links() }}
</div>
@endsection
