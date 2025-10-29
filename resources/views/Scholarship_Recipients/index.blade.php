@extends('layouts.app')

@section('title', 'Daftar Penerima Beasiswa')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h2>Daftar Penerima Beasiswa</h2>
            <hr>
            <a href="{{ route('scholarship_recipients.create') }}" class="btn btn-primary mb-3">
                + Tambah Data Baru
            </a>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Beasiswa</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($scholarshipRecipients as $index => $recipient)
                                    <tr>
                                        <td>{{ $scholarshipRecipients->firstItem() + $index }}</td>

                                        <td>{{ $recipient->student->name ?? 'N/A' }}</td>
                                        <td>{{ $recipient->scholarship->name ?? 'N/A' }}</td>

                                        <td>{{ $recipient->year }}</td>
                                        <td>

                                            @if ($recipient->status == 'active')
                                                <span class="badge bg-success">Active</span>
                                            @elseif ($recipient->status == 'inactive')
                                                <span class="badge bg-secondary">Inactive</span>
                                            @else
                                                <span class="badge bg-info text-dark">Graduated</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('scholarship_recipients.edit', $recipient->id) }}" class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('scholarship_recipients.destroy', $recipient->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            Tidak ada data penerima beasiswa.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $scholarshipRecipients->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
