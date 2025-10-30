@extends('layouts.app')

@section('content')
<div class="container py-3">
    <h3 class="mb-3">{{ isset($teaching_lecturer) ? 'Edit Teaching Lecturer' : 'Create Teaching Lecturer' }}</h3>

    <form action="{{ isset($teaching_lecturer)
        ? route('teaching-lecturers.update', $teaching_lecturer->id)
        : route('teaching-lecturers.store') }}" method="POST">

        @csrf
        @if(isset($teaching_lecturer))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label class="form-label">Lecturer</label>
            <select name="lecturer_id" class="form-control" required>
                <option value="">-- Select Lecturer --</option>
                @foreach($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}"
                        {{ old('lecturer_id', $teaching_lecturer->lecturer_id ?? '') == $lecturer->id ? 'selected' : '' }}>
                        {{ $lecturer->name }}
                    </option>
                @endforeach
            </select>
            @error('lecturer_id') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Class</label>
            <select name="class_id" class="form-control" required>
                <option value="">-- Select Class --</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}"
                        {{ old('class_id', $teaching_lecturer->class_id ?? '') == $class->id ? 'selected' : '' }}>
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>
            @error('class_id') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Teaching Status</label>
            <input type="text" name="teaching_status" class="form-control"
                value="{{ old('teaching_status', $teaching_lecturer->teaching_status ?? 'active') }}" required>
            @error('teaching_status') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Remarks</label>
            <textarea name="remarks" class="form-control" rows="3">{{ old('remarks', $teaching_lecturer->remarks ?? '') }}</textarea>
            @error('remarks') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-primary">
            {{ isset($teaching_lecturer) ? 'Update' : 'Save' }}
        </button>
        <a href="{{ route('teaching-lecturers.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
