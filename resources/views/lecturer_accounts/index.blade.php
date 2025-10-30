@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="mb-4">Lecturer Accounts</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="mb-3">
        <a href="{{ route('lecturer-accounts.create') }}" class="btn btn-primary">+ Add Lecturer Account</a>
    </div>
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Lecturer</th>
                <th>Status</th>
                <th>Last Login</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($accounts as $index => $account)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $account->user->name ?? '-' }}</td>
                    <td>{{ $account->lecturer->name ?? '-' }}</td>
                    <td>
                        <span class="badge 
                            @if($account->status == 'active') bg-success 
                            @elseif($account->status == 'inactive') bg-secondary 
                            @else bg-warning text-dark @endif">
                            {{ ucfirst($account->status) }}
                        </span>
                    </td>
                    <td>{{ $account->last_login ? \Carbon\Carbon::parse($account->last_login)->format('d M Y H:i') : '-' }}</td>
                    <td>
                        <a href="{{ route('lecturer-accounts.show', $account->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('lecturer-accounts.edit', $account->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('lecturer-accounts.destroy', $account->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this account?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No lecturer accounts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection