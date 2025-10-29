{{-- resources/views/tuition_fees/index.blade.php --}}

@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Daftar Biaya Kuliah (Tuition Fees)</h1>
            
            {{-- Pesan Sukses (Setelah Store/Update/Delete) --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Tombol Tambah --}}
            <a href="{{ route('tuition-fee.create') }}" class="btn btn-primary mb-3">
                Tambah Biaya Kuliah Baru
            </a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Program Studi</th>
                        <th>Semester</th>
                        <th>Jumlah (Rp)</th>
                        <th>Tipe Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tuitionFees as $fee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- Menggunakan relasi studyProgram yang sudah di-eager load --}}
                        <td>{{ $fee->studyProgram->name ?? 'N/A' }}</td> 
                        <td>{{ $fee->semester }}</td>
                        <td>{{ number_format($fee->amount, 0, ',', '.') }}</td>
                        <td>{{ $fee->payment_type }}</td>
                        <td>
                            {{-- Tombol Edit --}}
                            <a href="{{ route('tuition-fee.edit', $fee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            
                            {{-- Tombol Delete --}}
                            <form action="{{ route('tuition-fee.destroy', $fee->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Tampilkan Link Pagination --}}
            {{ $tuitionFees->links() }}
        </div>
    </div>
</div>
@endsection