@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Data Alumni') }}
                    <a href="{{ route('alumni.create') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Student</th>
                                <th>NIM</th>
                                <th>Tahun Lulus</th>
                                <th>Pekerjaan</th>
                                <th>Perusahaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($alumni as $index => $item)
                                <tr>
                                    <td>{{ $index + $alumni->firstItem() }}</td>
                                    <td>{{ $item->student->name ?? 'N/A' }}</td>
                                    <td>{{ $item->student->nim ?? 'N/A' }}</td>
                                    <td>{{ $item->graduation_year }}</td>
                                    <td>{{ $item->occupation ?? '-' }}</td>
                                    <td>{{ $item->company ?? '-' }}</td>
                                    <td>
                                        <form action="{{ route('alumni.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('alumni.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Link Paginasi --}}
                    <div class="d-flex justify-content-center">
                        {{ $alumni->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection