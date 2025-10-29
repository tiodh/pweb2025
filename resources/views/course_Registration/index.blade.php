@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4 text-center fw-bold">Daftar KRS Mahasiswa</h3>

    <div class="text-end mb-3">
        <a href="{{ route('course_registration.create') }}" class="btn btn-success">+ Tambah KRS</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-success text-center">
                    <tr>
                        <th>ID</th>
                        <th>Registration ID</th>
                        <th>Class ID</th>
                        <th>Tanggal Registrasi</th>
                        <th>Status Validasi</th>
                        <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courseRegistrations as $item)
                        <tr>
                            <td class="text-center">{{ $item->id }}</td>
                            <td class="text-center">{{ $item->registration_id }}</td>
                            <td class="text-center">{{ $item->class_id }}</td>
                            <td class="text-center">{{ $item->registration_date }}</td>
                            <td class="text-center">
                                <span class="badge 
                                    @if($item->validation_status == 'approved') bg-success 
                                    @elseif($item->validation_status == 'pending') bg-warning 
                                    @else bg-danger @endif">
                                    {{ ucfirst($item->validation_status) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('course_registration.edit', $item->id) }}" 
                                   class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('course_registration.destroy', $item->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        🗑 Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data KRS</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
