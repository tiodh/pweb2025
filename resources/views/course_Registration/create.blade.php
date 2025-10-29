@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah KRS</h3>
    <form action="{{ route('course_registration.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Registration</label>
            <select name="registration_id" class="form-control">
                @foreach($registrations as $r)
                    <option value="{{ $r->id }}">{{ $r->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Class</label>
            <select name="class_id" class="form-control">
                @foreach($classes as $c)
                    <option value="{{ $c->id }}">{{ $c->class_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Registrasi</label>
            <input type="date" name="registration_date" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status Validasi</label>
            <select name="validation_status" class="form-control">
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('course_registration.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
