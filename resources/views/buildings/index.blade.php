@extends('layouts.app')

@section('content')
<h2 class="mb-4">Manajemen Gedung</h2>

{{-- Form Tambah / Edit --}}
<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">
            {{ isset($edit) ? 'Edit Gedung' : 'Tambah Gedung' }}
        </h5>

        <form action="{{ isset($edit) ? route('buildings.update', $edit->id) : route('buildings.store') }}" method="POST">
            @csrf
            @if(isset($edit))
                @method('PUT')
            @endif

            <div class="row mb-2">
                <div class="col">
                    <label class="form-label">Nama Gedung</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ $edit->name ?? '' }}" required>
                </div>

                <div class="col">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="location" class="form-control"
                        value="{{ $edit->location ?? '' }}" required>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <label class="form-label">Jumlah Lantai</label>
                    <input type="number" name="floors" class="form-control"
                        value="{{ $edit->floors ?? '' }}" required>
                </div>

                <div class="col">
                    <label class="form-label">Kode Gedung</label>
                    <input type="text" name="building_code" class="form-control"
                        value="{{ $edit->building_code ?? '' }}" required>
                </div>
            </div>

            <button class="btn btn-success">
                {{ isset($edit) ? 'Update' : 'Simpan' }}
            </button>

            @if(isset($edit))
                <a href="{{ route('buildings.index') }}" class="btn btn-secondary">Batal</a>
            @endif
        </form>
    </div>
</div>

{{-- Tabel Data --}}
<table class="table table-bordered table-striped text-center align-middle">
    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Floors</th>
            <th>Code</th>
            <th width="150px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($buildings as $b)
        <tr>
            <td>{{ $b->name }}</td>
            <td>{{ $b->location }}</td>
            <td>{{ $b->floors }}</td>
            <td>{{ $b->building_code }}</td>
            <td>
                <<a href="{{ route('buildings.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('buildings.destroy', $b->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin dihapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5">Belum ada data.</td></tr>
        @endforelse
    </tbody>
</table>

@endsection
