@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 max-w-3xl">

    {{-- Judul Halaman dan Tombol Kembali --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Detail Akun Mahasiswa</h1>
        <a href="{{ route('student_accounts.index') }}"
           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            &larr; Kembali
        </a>
    </div>

    {{-- Konten Detail --}}
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

        {{-- Status Akun --}}
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Status Akun</h2>
            <div class="flex items-center">
                <span class="text-gray-700 font-bold mr-2">Status:</span>
                @if ($studentAccount->status == 'active')
                    <span class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-sm font-medium">
                        {{ ucfirst($studentAccount->status) }}
                    </span>
                @else
                    <span class="bg-red-200 text-red-700 py-1 px-3 rounded-full text-sm font-medium">
                        {{ ucfirst($studentAccount->status) }}
                    </span>
                @endif
            </div>
            <div class="mt-2">
                <span class="text-gray-700 font-bold mr-2">Login Terakhir:</span>
                <span class="text-gray-600">
                    {{ $studentAccount->last_login?->format('d M Y, H:i:s') ?? 'Belum pernah login' }}
                </span>
            </div>
        </div>

        <hr class="my-6">

        {{-- Detail User (Login) --}}
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Data User (Login)</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <span class="text-gray-700 font-bold">Nama User:</span>
                    <p class="text-gray-600">{{ $studentAccount->user?->name ?? 'N/A' }}</p>
                </div>
                <div>
                    <span class="text-gray-700 font-bold">Email User:</span>
                    <p class="text-gray-600">{{ $studentAccount->user?->email ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <hr class="my-6">

        {{-- Detail Profil Mahasiswa --}}
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Data Profil Mahasiswa</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <span class="text-gray-700 font-bold">Nama Mahasiswa:</span>
                    <p class="text-gray-600">{{ $studentAccount->student?->name ?? 'N/A' }}</p>
                </div>
                <div>
                    <span class="text-gray-700 font-bold">NIM:</span>
                    <p class="text-gray-600">{{ $studentAccount->student?->nim ?? 'N/A' }}</p>
                </div>
                <div>
                    <span class="text-gray-700 font-bold">Tahun Angkatan:</span>
                    <p class="text-gray-600">{{ $studentAccount->student?->cohort_year ?? 'N/A' }}</p>
                </div>
                <div>
                    <span class="text-gray-700 font-bold">Program Studi:</span>
                    <p class="text-gray-600">{{ $studentAccount->student?->studyProgram?->name ?? 'N/A' }}</p>
                </div>
            </div>
