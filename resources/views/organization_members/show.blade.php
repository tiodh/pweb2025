@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detail Anggota Organisasi</h2>

    <a href="{{ route('organization_members.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <div class="card p-4">
        <p><strong>ID:</strong> {{ $member->id }}</p>
        <p><strong>Organization:</strong> {{ $member->organization->name ?? '-' }}</p>
        <p><strong>Student:</strong> {{ $member->student->name ?? '-' }}</p>
        <p><strong>Position:</strong> {{ $member->position }}</p>
        <p><strong>Period:</strong> {{ $member->period }}</p>
    </div>
</div>
@endsection
