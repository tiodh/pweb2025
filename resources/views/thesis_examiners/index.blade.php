@extends('layouts.app')

@section('content')
<div class="container py-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Thesis Examiners</h3>
        <a href="{{ route('thesis-examiners.create') }}" class="btn btn-primary">Add Examiner</a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Thesis Defense ID</th>
                    <th>Lecturer ID</th>
                    <th>Grade</th>
                    <th>Remarks</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($te as $index => $examiner)
                    <tr>
                        <td>{{ $te->firstItem() + $index }}</td>
                        <td>{{ $examiner->thesis_defense_id }}</td>
                        <td>{{ $examiner->lecturer_id }}</td>
                        <td>{{ $examiner->grade ?? '-' }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($examiner->remarks, 80) ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ route('thesis-examiners.edit', $examiner->id) }}"
                               class="btn btn-sm btn-outline-secondary">
                                Edit
                            </a>

                            <form action="{{ route('thesis-examiners.destroy', $examiner->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Delete this record?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No examiners found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if(method_exists($te, 'links'))
        <div class="d-flex justify-content-end">
            {{ $te->links() }}
        </div>
    @endif
</div>
@endsection
