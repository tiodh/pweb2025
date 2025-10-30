@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12"> {{-- Buat lebih lebar --}}

            {{-- HEADER: Judul Halaman dan Tombol Tambah --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h1 class="h3 mb-0">Daftar Akun Mahasiswa</h1>
                    <p class="text-muted mb-0">Kelola semua akun yang terdaftar untuk mahasiswa.</p>
                </div>
                <a href="{{ route('student_accounts.create') }}" class="btn btn-primary shadow-sm">
                    <i class="fas fa-plus me-1"></i> {{-- (Opsional: Jika Anda punya Font Awesome) --}}
                    + Tambah Akun
                </a>
            </div>

            {{-- KONTEN: Tabel Data --}}
            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            {{-- Table Header --}}
                            <thead class="table-light">
                                <tr class="text-uppercase small">
                                    <th scope="col" class="py-3 px-3">No</th>
                                    <th scope="col" class="py-3 px-3">Nama (User)</th>
                                    <th scope="col" class="py-3 px-3">NIM (Student)</th>
                                    <th scope="col" class="py-3 px-3 text-center">Status</th>
                                    <th scope="col" class="py-3 px-3">Login Terakhir</th>
                                    <th scope="col" class="py-3 px-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            {{-- Table Body --}}
                            <tbody class="align-middle">
                                @forelse ($accounts as $index => $account)
                                    <tr>
                                        <td class="py-3 px-3">
                                            {{ $accounts->firstItem() + $index }}
                                        </td>
                                        <td class="py-3 px-3">
                                            <span class="fw-bold">{{ $account->user?->name ?? '-' }}</span>
                                        </td>
                                        <td class="py-3 px-3">
                                            {{ $account->student?->nim ?? '-' }}
                                        </td>
                                        <td class="py-3 px-3 text-center">
                                            {{-- Badge Status Bootstrap --}}
                                            @if ($account->status == 'active')
                                                <span class="badge bg-success-subtle text-success-emphasis rounded-pill">
                                                    Aktif
                                                </span>
                                            @elseif ($account->status == 'inactive')
                                                <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">
                                                    Nonaktif
                                                </span>
                                            @else
                                                <span class="badge bg-danger-subtle text-danger-emphasis rounded-pill">
                                                    Dibekukan
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-3">
                                            {{ $account->last_login?->format('d M Y, H:i') ?? 'Belum login' }}
                                        </td>
                                        <td class="py-3 px-3 text-center">
                                            {{-- Tombol Aksi Bootstrap --}}
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('student_accounts.show', $account) }}" class="btn btn-info btn-sm me-2" title="Detail">
                                                    Detail
                                                </a>
                                                <a href="{{ route('student_accounts.edit', $account) }}" class="btn btn-warning btn-sm me-2" title="Edit">
                                                    Edit
                                                </a>
                                                <form action="{{ route('student_accounts.destroy', $account) }}" method="POST"
                                                      class="delete-form"
                                                      data-nama="{{ $account->user?->name ?? 'akun ini' }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    {{-- Tampilan jika data kosong --}}
                                    <tr>
                                        <td colspan="6" class="py-5 px-3 text-center text-muted">
                                            <h5 class="mb-1">Tidak ada data akun mahasiswa.</h5>
                                            <p class="mb-0">Silakan buat akun baru dengan menekan tombol "Tambah Akun".</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- PAGINASI --}}
                @if ($accounts->hasPages())
                <div class="card-footer bg-light border-0">
                    {{ $accounts->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- Skrip SweetAlert ini tidak perlu diubah, akan tetap berfungsi --}}
<script>
    @if (session('success'))
        Swal.fire({
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false
        });
    @endif

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
