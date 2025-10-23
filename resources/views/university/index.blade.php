@extends('layouts.app')

@section('content')
<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Universities</h3>
        <a href="{{ route('universities.create') }}" class="btn btn-primary">Create University</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($universities as $index => $university)
                    <tr>
                        <td>{{ $universities->firstItem() + $index ?? $loop->iteration }}</td>
                        <td>{{ $university->name }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($university->address, 80) }}</td>
                        <td>{{ $university->phone }}</td>
                        <td>{{ $university->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('universities.edit', $university->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

                            <form action="{{ route('universities.destroy', $university->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this university?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No universities found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(method_exists($universities, 'links'))
        <div class="d-flex justify-content-end">
            {{ $universities->links() }}
        </div>
    @endif
</div>
@endsection