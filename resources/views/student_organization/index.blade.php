@extends('layouts.app')

@section('content')

<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Student Organizations</h3>
        <a href="{{ route('student-organizations.create') }}" class="btn btn-primary">Add Organization</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Established Year</th>
                    <th>Advisor</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($studentOrganizations as $index => $organization)
                    <tr>
                        {{-- <td>{{ $index + 1 }}</td> --}}
                        <td>{{ $studentOrganizations->firstItem() + $index ?? $loop->iteration }}</td>
                        <td>{{ $organization->name }}</td>
                        <td>{{ $organization->type }}</td>
                        <td>{{ $organization->established_year }}</td>
                        <td>{{ $organization->advisor->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('student-organizations.edit', $organization->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

                            <form action="{{ route('student-organizations.destroy', $organization->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this organization?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No organizations found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(method_exists($studentOrganizations, 'links'))
        <div class="d-flex justify-content-end">
            {{ $studentOrganizations->links() }}
        </div>
    @endif
</div>


@endsection