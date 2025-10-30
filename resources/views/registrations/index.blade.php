@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrations</h1>
    <a href="{{ route('registrations.create') }}" class="btn btn-primary mb-3">Add Registration</a>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Student</th>
            <th>Semester</th>
            <th>Academic Year</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($registrations as $reg)
        <tr>
            <td>{{ $reg->id }}</td>
            <td>{{ $reg->student->name ?? 'N/A' }}</td>
            <td>{{ $reg->semester }}</td>
            <td>{{ $reg->academic_year }}</td>
            <td>{{ $reg->status }}</td>
            <td>
                <a href="{{ route('registrations.edit', $reg->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('registrations.destroy', $reg->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
