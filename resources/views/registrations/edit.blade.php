@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Registration</h1>
    <form action="{{ route('registrations.update', $registration->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Student</label>
            <select name="student_id" class="form-control">
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $registration->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Semester</label>
            <input type="text" name="semester" value="{{ $registration->semester }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Academic Year</label>
            <input type="text" name="academic_year" value="{{ $registration->academic_year }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Status</label>
            <input type="text" name="status" value="{{ $registration->status }}" class="form-control">
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
