{{-- Menggunakan layout standar Laravel (jika ada) --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Daftar Akun Mahasiswa</h1>
        <a href="{{ route('student_accounts.create') }}"
           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + Tambah Akun
        </a>
    </div>

    {{-- Pesan Sukses (jika ada) --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Tabel Data --}}
    <div class="bg-white shadow-md rounded overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">No</th>
                    <th class="py-3 px-6 text-left">Nama (User)</th>
                    <th class="py-3 px-6 text-left">NIM (Student)</th>
                    <th class="py-3 px-6 text-center">Status</th>
                    <th class="py-3 px-6 text-left">Login Terakhir</th>
                    <th class="py-3 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">

                {{-- Loop data $accounts --}}
                @forelse ($accounts as $index => $account)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            {{-- Menghitung nomor urut berdasarkan paginasi --}}
                            {{ $accounts->firstItem() + $index }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            {{-- Tampilkan nama user, beri '-' jika data user tidak ada (opsional) --}}
                            {{ $account->user?->name ?? '-' }}
                        </td>
                        <td class="py-3 px-6 text-left">
                             {{-- Tampilkan NIM student, beri '-' jika data student tidak ada (opsional) --}}
                            {{ $account->student?->nim ?? '-' }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            {{-- Contoh styling untuk status --}}
                            @if ($account->status == 'active')
                                <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">
                                    {{ $account->status }}
                                </span>
                            @else
                                <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">
                                    {{ $account->status }}
                                </span>
                            @endif
                        </td>
                        <td class="py-3 px-6 text-left">
                            {{-- Format tanggal, ?-> adalah null-safe operator --}}
                            {{ $account->last_login?->format('d M Y, H:i') ?? 'Belum login' }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center space-x-2">
                                {{-- Tombol Detail (Show) --}}
                                <a href="{{ route('student_accounts.show', $account) }}"
                                   class="text-blue-500 hover:text-blue-700 font-medium">
                                   Detail
                                </a>

                                {{-- Tombol Edit --}}
                                <a href="{{ route('student_accounts.edit', $account) }}"
                                   class="text-yellow-500 hover:text-yellow-700 font-medium">
                                   Edit
                                </a>

                                {{-- Tombol Hapus (dalam form) --}}
                                <form action="{{ route('student_accounts.destroy', $account) }}" method="POST"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    {{-- Tampilkan jika tidak ada data --}}
                    <tr>
                        <td colspan="6" class="py-6 px-6 text-center text-gray-500">
                            Tidak ada data akun mahasiswa.
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    {{-- Link Paginasi --}}
    <div class="mt-6">
        {{ $accounts->links() }}
    </div>

</div>
@endsection
