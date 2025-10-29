@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Jadwal Kuliah Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="class_id">Kelas:</label>
            <select name="class_id" id="class_id" class="form-control" required>
                <option value="">-- Pilih Kelas --</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                        {{ $class->class_name ?? $class->id }} 
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="room_id">Ruangan:</label>
            <select name="room_id" id="room_id" class="form-control" required>
                <option value="">-- Pilih Ruangan --</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                        {{ $room->room_code ?? $room->id }} 
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="day">Hari:</label>
            <input type="text" name="day" id="day" class="form-control" value="{{ old('day') }}" required>
        </div>

        <div class="form-group">
            <label for="start_time">Waktu Mulai (HH:MM):</label>
            <input type="time" name="start_time" id="start_time" class="form-control" value="{{ old('start_time') }}" required>
        </div>

        <div class="form-group">
            <label for="end_time">Waktu Selesai (HH:MM):</label>
            <input type="time" name="end_time" id="end_time" class="form-control" value="{{ old('end_time') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Jadwal</button>
        <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection