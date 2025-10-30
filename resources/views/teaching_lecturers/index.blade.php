@extends('layouts.app')

@section('content')
<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Teaching Lecturers</h3>
        <a href="{{ route('teaching-lecturers.create') }}" class="btn btn-primary">
            + Add Teaching Lecturer
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Lecturer</th>
                        <th>Class</th>
                        <th>Teaching Status</th>
                        <th>Remarks</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teachings as $index => $teaching)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $teaching->lecturer->name ?? 'N/A' }}</td>
                            <td>{{ $teaching->class->name ?? 'N/A' }}</td>
                            <td>
                                <span class="badge 
                                    @if($teaching->teaching_status == 'active') bg-success 
                                    @elseif($teaching->teaching_status == 'inactive') bg-secondary 
                                    @else bg-warning text-dark @endif">
                                    {{ ucfirst($teaching->teaching_status) }}
                                </span>
                            </td>
                            <td>{{ $teaching->remarks ?? '-' }}</td>
                            <td>{{ $teaching->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('teaching-lecturers.edit', $teaching->id) }}" 
                                   class="btn btn-sm btn-outline-warning">
                                    Edit
                                </a>
                                <form action="{{ route('teaching-lecturers.destroy', $teaching->id) }}" 
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this record?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-3">No teaching lecturers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
