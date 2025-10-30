@extends('layouts.app')

@section('content')
<div class="container py-3">
    <h3>{{ isset($studentOrganization) ? 'Edit Organization' : 'Create Organization' }}</h3>

    <form action="{{ isset($studentOrganization) ? route('student-organizations.update', $studentOrganization->id) : route('student-organizations.store') }}" method="POST">
        @csrf
        @if(isset($studentOrganization))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $studentOrganization->name ?? '') }}" required>
            @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input id="type" name="type" type="text" class="form-control" value="{{ old('type', $studentOrganization->type ?? '') }}" required>
            @error('type') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="established_year" class="form-label">Established Year</label>
            <input id="established_year" name="established_year" type="text" class="form-control" value="{{ old('established_year', $studentOrganization->established_year ?? '') }}" required>
            @error('established_year') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        {{-- <div class="mb-3">
            <label for="advisor" class="form-label">Advisor</label>
            <input id="advisor" name="advisor" type="advisor" class="form-control" value="{{ old('advisor', $studentOrganization->advisor->name ?? '') }}" required>
            @error('advisor') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div> --}}

        <div class="mb-3">
            <label for="advisor_id" class="form-label">Advisor</label>
            <select id="advisor_id" name="advisor_id" class="form-control" required>
                <option value="">-- Select Advisor --</option>
                @foreach($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}"
                        {{ old('advisor_id', $studentOrganization->advisor_id ?? '') == $lecturer->id ? 'selected' : '' }}>
                        {{ $lecturer->name }}
                    </option>
                @endforeach
            </select>
            @error('advisor_id')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($studentOrganization) ? 'Update' : 'Save' }}</button>
        <a href="{{ route('student-organizations.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>
@endsection