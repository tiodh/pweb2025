@extends('layouts.academic_years')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="mb-0">Daftar Tahun Akademik</h2>
        </div>
        <div class="d-flex">
            <a href="{{ route('home') }}" class="btn btn-secondary me-2">
                ← Kembali ke Dashboard
            </a>
            <a href="{{ route('academic-years.create') }}" class="btn btn-primary">
                + Tambah Tahun Akademik
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Status Aktif</th>
                <th>Catatan</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($academicYears as $year)
                <tr>
                    <td>{{ $year->id }}</td>
                    <td>{{ $year->start_year }}</td>
                    <td>{{ $year->end_year }}</td>
                    <td>
                        @if($year->active_status)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                    <td>{{ $year->notes }}</td>
                    <td>{{ $year->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('academic-years.edit', $year) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('academic-years.destroy', $year) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center">Belum ada data tahun akademik</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
