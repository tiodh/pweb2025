@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Detail Fakultas</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $faculty->name }} ({{ $faculty->faculty_code }})</h5>
            <h6 class="card-subtitle mb-2 text-muted">Dekan: {{ $faculty->dean }}</h6>
            <p class="card-text">Bagian dari: {{ $faculty->university->name }}</p>
        </div>
    </div>
    <a href="{{ route('faculties.index') }}" class="btn btn-primary mt-3">Kembali</a>
</div>
@endsection