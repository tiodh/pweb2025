@extends('layouts.academic_years')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-4 text-gray-700">Tambah Tahun Akademik</h2>

    <form action="{{ route('academic-years.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="block text-gray-600">Tahun Mulai</label>
            <input type="number" name="start_year" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-3">
            <label class="block text-gray-600">Tahun Akhir</label>
            <input type="number" name="end_year" class="border rounded w-full p-2" required>
        </div>

        <div class="mb-3">
            <label class="block text-gray-600">Status Aktif</label>
            <select name="active_status" class="border rounded w-full p-2">
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="block text-gray-600">Catatan</label>
            <textarea name="notes" class="border rounded w-full p-2"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection

