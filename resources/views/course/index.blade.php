@extends('layouts.app')

@section('content')
<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Mata Kuliah</h3>
        <a href="{{ route('course.create') }}" class="btn btn-primary">Tambah Mata Kuliah</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Kode</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Program Studi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $index => $course)
                    <tr>
                        <td>{{ $courses->firstItem() + $index ?? $loop->iteration }}</td>

                        <td>{{ $course->course_code }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->credits }}</td>

                        <td>{{ $course->studyProgram?->name ?? 'N/A' }}</td>

                        <td class="text-center">
                            <a href="{{ route('course.edit', $course->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

                            <form action="{{ route('course.destroy', $course->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data mata kuliah.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(method_exists($courses, 'links'))
        <div class="d-flex justify-content-end">
            {{ $courses->links() }}
        </div>
    @endif
</div>
@endsection