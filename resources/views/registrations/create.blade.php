@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Registration</h1>
    <form action="{{ route('registrations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Student</label>
            <select name="student_id" class="form-control">
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Semester</label>
            <input type="text" name="semester" class="form-control">
        </div>
        <div class="mb-3">
            <label>Academic Year</label>
            <input type="text" name="academic_year" class="form-control">
        </div>
        <div class="mb-3">
            <label>Status</label>
            <input type="text" name="status" class="form-control">
        </div>
        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
