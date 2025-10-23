@extends('layouts.app')

@section('content')
<div class="container py-3">
    <h3>{{ isset($university) ? 'Edit University' : 'Create University' }}</h3>

    <form action="{{ isset($university) ? route('universities.update', $university->id) : route('universities.store') }}" method="POST">
        @csrf
        @if(isset($university))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $university->name ?? '') }}" required>
            @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea id="address" name="address" class="form-control" rows="3" required>{{ old('address', $university->address ?? '') }}</textarea>
            @error('address') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input id="phone" name="phone" type="text" class="form-control" value="{{ old('phone', $university->phone ?? '') }}" required>
            @error('phone') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $university->email ?? '') }}" required>
            @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($university) ? 'Update' : 'Save' }}</button>
        <a href="{{ route('universities.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>
@endsection

