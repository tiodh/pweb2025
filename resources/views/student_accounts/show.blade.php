@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- HEADER: Judul Halaman dan Tombol Kembali --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h3 mb-0">Detail Akun Mahasiswa</h1>
                <a href="{{ route('student_accounts.index') }}" class="btn btn-secondary shadow-sm">
                    &larr; Kembali
                </a>
            </div>

            {{-- KONTEN: Detail Data --}}
            <div class="card shadow-sm border-0">
                {{-- Grup 1: Status Akun --}}
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0">Status Akun</h5>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4 fw-medium">Status</dt>
                        <dd class="col-sm-8">
                            @if ($studentAccount->status == 'active')
                                <span class="badge bg-success-subtle text-success-emphasis rounded-pill">Aktif</span>
                            @elseif ($studentAccount->status == 'inactive')
                                <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Nonaktif</span>
                            @else
                                <span class="badge bg-danger-subtle text-danger-emphasis rounded-pill">Dibekukan</span>
                            @endif
                        </dd>

                        <dt class="col-sm-4 fw-medium">Login Terakhir</dt>
                        <dd class="col-sm-8">{{ $studentAccount->last_login?->format('d M Y, H:i:s') ?? 'Belum pernah login' }}</dd>
                    </dl>
                </div>

                {{-- Grup 2: Detail User (Login) --}}
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0">Data User (Login)</h5>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4 fw-medium">Nama User</dt>
                        <dd class="col-sm-8">{{ $studentAccount->user?->name ?? 'N/A' }}</dd>

                        <dt class="col-sm-4 fw-medium">Email User</dt>
                        <dd class="col-sm-8">{{ $studentAccount->user?->email ?? 'N/A' }}</dd>
                    </dl>
                </div>

                {{-- Grup 3: Detail Profil Mahasiswa --}}
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0">Data Profil Mahasiswa</h5>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4 fw-medium">Nama Mahasiswa</dt>
                        <dd class="col-sm-8">{{ $studentAccount->student?->name ?? 'N/A' }}</g>

                        <dt class="col-sm-4 fw-medium">NIM</dt>
                        <dd class="col-sm-8">{{ $studentAccount->student?->nim ?? 'N/A' }}</g>

                        <dt class="col-sm-4 fw-medium">Tahun Angkatan</dt>
                        <dd class="col-sm-8">{{ $studentAccount->student?->cohort_year ?? 'N/A' }}</g>

                        <dt class="col-sm-4 fw-medium">Program Studi</dt>
                        <dd class="col-sm-8">{{ $studentAccount->student?->studyProgram?->name ?? 'N/A' }}</g>
                    </dl>
                </div>

                {{-- Tombol Aksi --}}
                <div class="card-footer bg-light border-0 text-end">
                    <a href="{{ route('student_accounts.edit', $studentAccount) }}" class="btn btn-warning shadow-sm me-2">
                        Edit
                    </a>
                    <form action="{{ route('student_accounts.destroy', $studentAccount) }}" method="POST"
                          class="delete-form d-inline-block"
                          data-nama="{{ $studentAccount->user?->name ?? 'akun ini' }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger shadow-sm">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- Script SweetAlert untuk tombol Hapus --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                const nama = this.getAttribute('data-nama');
                Swal.fire({
                    title: 'Anda yakin?',
                    text: `Data akun untuk "${nama}" akan dihapus permanen!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    });
</script>
@endpush
