@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Daftar Anggota Organisasi</h2>

    <a href="{{ route('organization_members.create') }}" class="btn btn-primary mb-3">+ Tambah Anggota</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <p>Total data: {{ $members->count() }}</p>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Organization</th>
                <th>Student</th>
                <th>Position</th>
                <th>Period</th>
                <th width="180px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->organization->name ?? '-' }}</td>
                    <td>{{ $member->student->name ?? '-' }}</td>
                    <td>{{ $member->position }}</td>
                    <td>{{ $member->period }}</td>
                    <td>
                        <a href="{{ route('organization_members.show', $member->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('organization_members.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('organization_members.destroy', $member->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
