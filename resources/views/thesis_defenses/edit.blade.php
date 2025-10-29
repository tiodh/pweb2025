@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Edit Thesis Defense</h2>

    <form action="{{ route('thesis_defenses.update', $thesisDefense->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="thesis_id" class="form-label">Thesis</label>
            <select name="thesis_id" id="thesis_id" class="form-select">
                @foreach ($theses as $thesis)
                    <option value="{{ $thesis->id }}" {{ $thesisDefense->thesis_id == $thesis->id ? 'selected' : '' }}>
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
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" {{ $thesisDefense->room_id == $room->id ? 'selected' : '' }}>
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
            <input type="date" name="defense_date" class="form-control" value="{{ $thesisDefense->defense_date }}">
            @error('defense_date')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="defense_status" class="form-label">Status</label>
            <select name="defense_status" id="defense_status" class="form-select">
                <option value="pending" {{ $thesisDefense->defense_status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $thesisDefense->defense_status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $thesisDefense->defense_status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
            @error('defense_status')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('thesis_defenses.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
