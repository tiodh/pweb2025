@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">

    {{-- Judul Halaman --}}
    <h1 class="text-3xl font-bold mb-6">Tambah Akun Mahasiswa Baru</h1>

    {{-- Menampilkan Error Validasi --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Oops! Ada yang salah:</strong>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Tambah Data --}}
    <form action="{{ route('student_accounts.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        {{-- Dropdown User --}}
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="user_id">
                User (Login)
            </label>
            <select name="user_id" id="user_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('user_id') border-red-500 @enderror">
                <option value="">-- Pilih User --</option>
                {{-- Loop $users yang dikirim dari controller --}}
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            @if($users->isEmpty())
                <p class="text-yellow-600 text-xs italic mt-1">
                    Semua user 'student' sudah memiliki akun.
                </p>
            @endif
        </div>

        {{-- Dropdown Student --}}
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="student_id">
                Profil Mahasiswa (Student)
            </label>
            <select name="student_id" id="student_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('student_id') border-red-500 @enderror">
                <option value="">-- Pilih Mahasiswa --</option>
                 {{-- Loop $students yang dikirim dari controller --}}
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                        {{ $student->name }} ({{ $student->nim }})
                    </option>
                @endforeach
            </select>
            @error('student_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            @if($students->isEmpty())
                 <p class="text-yellow-600 text-xs italic mt-1">
                    Semua data 'student' sudah memiliki akun.
                </p>
            @endif
        </div>

        {{-- Dropdown Status --}}
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                Status
            </label>
            <select name="status" id="status"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('status') border-red-500 @enderror">
                <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="suspended" {{ old('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
            </select>
            @error('status')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        {{-- (Opsional) Input Last Login --}}
        {{-- Biasanya ini diisi otomatis oleh sistem, tapi jika ingin di-set manual: --}}
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="last_login">
                Login Terakhir (Opsional)
            </label>
            <input type="datetime-local" name="last_login" id="last_login" value="{{ old('last_login') }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('last_login') border-red-500 @enderror">
            @error('last_login')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>


        {{-- Tombol Submit dan Batal --}}
        <div class="flex items-center justify-between mt-6">
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Simpan
            </button>
            <a href="{{ route('student_accounts.index') }}"
               class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-gray-800">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
