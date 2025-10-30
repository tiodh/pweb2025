@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Tambah Thesis Defense</h2>

    <form action="{{ route('thesis-defenses.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="thesis_id" class="form-label">Thesis</label>
            <select name="thesis_id" id="thesis_id" class="form-select">
                <option value="">-- Pilih Thesis --</option>
                @foreach ($theses as $thesis)
                    <option value="{{ $thesis->id }}" {{ old('thesis_id') == $thesis->id ? 'selected' : '' }}>
                        {{ $thesis->title }}
                    </option>
                @endforeach
            </select>
            @error('thesis_id')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="room_id" class="form-label">Room</label>
            <select name="room_id" id="room_id" class="form-select">
                <option value="">-- Pilih Room --</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                        {{ $room->name }}
                    </option>
                @endforeach
            </select>
            @error('room_id')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="defense_date" class="form-label">Tanggal Defense</label>
            <input type="date" name="defense_date" class="form-control" value="{{ old('defense_date') }}">
            @error('defense_date')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="defense_status" class="form-label">Status</label>
            <select name="defense_status" id="defense_status" class="form-select">
                <option value="pending" {{ old('defense_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ old('defense_status') == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ old('defense_status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
            @error('defense_status')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('thesis-defenses.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection