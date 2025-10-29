@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Detail: {{ $training->name }}</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Penyelenggara:</strong>
                        <p>{{ $training->provider }}</p>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <strong>Tanggal Mulai:</strong>
                        <p>{{ $training->start_date->format('l, d F Y \p\u\k\u\l H:i') }}</ims>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <strong>Tanggal Selesai:</strong>
                        <p>{{ $training->end_date->format('l, d F Y \p\u\k\u\l H:i') }}</p>
                    </div>
                    <hr>
                    <div class="text-muted">
                        <small>Dibuat pada: {{ $training->created_at->format('d M Y, H:i') }}</small><br>
                        <small>Diperbarui pada: {{ $training->updated_at->format('d M Y, H:i') }}</small>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('trainings.index') }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('trainings.edit', $training) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection