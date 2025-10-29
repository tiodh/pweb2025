@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Manage Departments

                    <a href="{{ route('departments.create') }}" class="btn btn-primary btn-sm float-right">Add Department</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Faculty Name</th> 
                                <th>Department Name</th>
                                <th>Department Code</th>
                                <th>Head of Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($departments as $department)
                            <tr>
                                <td>{{ $loop->iteration }}</td>


                                <td>{{ $department->faculty?->name }}</td>

                                <td>{{ $department->name }}</td>
                                <td>{{ $department->department_code }}</td>
                                <td>{{ $department->head_of_department }}</td>
                                <td>
                                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        {{-- Tambahkan konfirmasi agar aman --}}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus departemen ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection