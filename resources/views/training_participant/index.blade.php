@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Daftar Peserta Pelatihan</h3>
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('training-participant.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Peserta
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 5%;">#</th>
                            <th>Mahasiswa (NIM)</th>
                            <th>Pelatihan</th>
                            <th>Status Kehadiran</th>
                            <th>Sertifikat</th>
                            <th style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($participants as $participant)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $participant->student->name ?? 'N/A' }}
                                    <small class="text-muted">({{ $participant->student->nim ?? 'N/A' }})</small>
                                </td>
                                <td>{{ $participant->training->name ?? 'N/A' }}</td>
                                <td>
                                    @php
                                        $badgeClass = match($participant->attendance_status) {
                                            'Hadir' => 'bg-success',
                                            'Izin' => 'bg-info',
                                            'Absen' => 'bg-danger',
                                            default => 'bg-secondary',
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ $participant->attendance_status }}</span>
                                </td>
                                <td>
                                    @if ($participant->certificate)
                                        <i class="fas fa-check-circle text-success"></i> Ada
                                    @else
                                        <i class="fas fa-times-circle text-danger"></i> Belum
                                    @endif
                                </td>
                                <td>
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('training-participant.edit', $participant->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('training-participant.destroy', $participant->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus peserta ini? Aksi ini tidak dapat dibatalkan.')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada data peserta pelatihan yang terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $participants->links() }}
            </div>
        </div>
    </div>
</div>
@endsection