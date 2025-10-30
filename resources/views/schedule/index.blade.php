@extends('layouts.app') 

@section('content')
<div class="container">
    <h2>Daftar Jadwal Kuliah</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('schedules.create') }}" class="btn btn-primary mb-3">Tambah Jadwal Baru</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kelas</th>
                <th>Ruangan</th>
                <th>Hari</th>
                <th>Waktu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{ $schedule->id }}</td>
                <td>{{ $schedule->class->class_name ?? 'N/A' }}</td> 
                <td>{{ $schedule->room->room_code ?? 'N/A' }}</td>     
                <td>{{ $schedule->day }}</td>
                <td>{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}</td>
                <td>
                    <a href="{{ route('schedules.edit', $schedule) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('schedules.destroy', $schedule) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus jadwal ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Untuk pagination --}}
    {{ $schedules->links() }} 
</div>
@endsection