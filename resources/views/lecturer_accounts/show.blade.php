@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="mb-4">Lecturer Account Detail</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>User:</strong> {{ $lecturer_account->user->name ?? '-' }}</p>
            <p><strong>Lecturer:</strong> {{ $lecturer_account->lecturer->name ?? '-' }}</p>
            <p><strong>Status:</strong> 
                <span class="badge 
                    @if($lecturer_account->status == 'active') bg-success 
                    @elseif($lecturer_account->status == 'inactive') bg-secondary 
                    @else bg-warning text-dark @endif">
                    {{ ucfirst($lecturer_account->status) }}
                </span>
            </p>
            <p><strong>Last Login:</strong> 
                {{ $lecturer_account->last_login ? \Carbon\Carbon::parse($lecturer_account->last_login)->format('d M Y H:i') : '-' }}
            </p>
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('lecturer-accounts.edit', $lecturer_account->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('lecturer-accounts.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>