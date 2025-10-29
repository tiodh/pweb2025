@extends('layouts.app')

@section('content')
<div class="container py-3">
   <h3>{{ isset($thesis_examiner) ? 'Edit Thesis Examiner' : 'Add Thesis Examiner' }}</h3>

<form
    action="{{ isset($thesis_examiner)
        ? route('thesis-examiners.update', $thesis_examiner->id)
        : route('thesis-examiners.store') }}"
    method="POST"
>
    @csrf
    @if(isset($thesis_examiner))
        @method('PUT')
    @endif

        {{-- Thesis Defense ID --}}
        <div class="mb-3">
            <label for="thesis_defense_id" class="form-label">Thesis Defense ID</label>
            <input
                id="thesis_defense_id"
                name="thesis_defense_id"
                type="number"
                class="form-control"
                value="{{ old('thesis_defense_id', $thesis->thesis_defense_id ?? '') }}"
                required
            >
            @error('thesis_defense_id')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Lecturer ID --}}
        <div class="mb-3">
            <label for="lecturer_id" class="form-label">Lecturer ID</label>
            <input
                id="lecturer_id"
                name="lecturer_id"
                type="number"
                class="form-control"
                value="{{ old('lecturer_id', $thesis->lecturer_id ?? '') }}"
                required
            >
            @error('lecturer_id')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Grade --}}
        <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <input
                id="grade"
                name="grade"
                type="number"
                step="0.01"
                min="0"
                max="100"
                class="form-control"
                value="{{ old('grade', $thesis->grade ?? '') }}"
                required
            >
            @error('grade')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Remarks --}}
        <div class="mb-3">
            <label for="remarks" class="form-label">Remarks</label>
            <textarea
                id="remarks"
                name="remarks"
                class="form-control"
                rows="3"
            >{{ old('remarks', $thesis->remarks ?? '') }}</textarea>
            @error('remarks')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- Buttons --}}
        <button type="submit" class="btn btn-primary">
            {{ isset($thesis) ? 'Update' : 'Save' }}
        </button>
        <a href="{{ route('thesis-examiners.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>
@endsection
