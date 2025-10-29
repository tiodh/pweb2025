@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Jadwal Kuliah</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('schedules.update', $schedule) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="class_id">Kelas:</label>
            <select name="class_id" id="class_id" class="form-control" required>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}" {{ old('class_id', $schedule->class_id) == $class->id ? 'selected' : '' }}>
                        {{ $class->class_name ?? $class->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="room_id">Ruangan:</label>
            <select name="room_id" id="room_id" class="form-control" required>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}" {{ old('room_id', $schedule->room_id) == $room->id ? 'selected' : '' }}>
                        {{ $room->room_code ?? $room->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="day">Hari:</label>
            <input type="text" name="day" id="day" class="form-control" value="{{ old('day', $schedule->day) }}" required>
        </div>

        <div class="form-group">
            <label for="start_time">Waktu Mulai (HH:MM):</label>
            <input type="time" name="start_time" id="start_time" class="form-control" value="{{ old('start_time', \Carbon\Carbon::parse($schedule->start_time)->format('H:i')) }}" required>
        </div>

        <div class="form-group">
            <label for="end_time">Waktu Selesai (HH:MM):</label>
            <input type="time" name="end_time" id="end_time" class="form-control" value="{{ old('end_time', \Carbon\Carbon::parse($schedule->end_time)->format('H:i')) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Jadwal</button>
        <a href="{{ route('schedules.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection