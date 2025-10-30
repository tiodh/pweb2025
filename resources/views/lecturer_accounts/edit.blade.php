@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="mb-4">Edit Lecturer Account</h2>
    <form action="{{ route('lecturer-accounts.update', $lecturer_account->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">Select User</label>
            <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $lecturer_account->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="lecturer_id" class="form-label">Select Lecturer</label>
            <select name="lecturer_id" id="lecturer_id" class="form-select @error('lecturer_id') is-invalid @enderror">
                @foreach ($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}" {{ $lecturer_account->lecturer_id == $lecturer->id ? 'selected' : '' }}>
                        {{ $lecturer->name }} ({{ $lecturer->nim }})
                    </option>
                @endforeach
            </select>
            @error('lecturer_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Account Status</label>
            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                <option value="active" {{ $lecturer_account->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $lecturer_account->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="suspended" {{ $lecturer_account->status == 'suspended' ? 'selected' : '' }}>Suspended</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="last_login" class="form-label">Last Login (optional)</label>
            <input type="datetime-local" name="last_login" id="last_login" 
                    class="form-control @error('last_login') is-invalid @enderror"
                    value="{{ old('last_login', $lecturer_account->last_login ? \Carbon\Carbon::parse($lecturer_account->last_login)->format('Y-m-d\TH:i') : '') }}">
            @error('last_login')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('lecturer-accounts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection