@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Tambah Training Baru</h2>
                </div>
                
                <form action="{{ route('trainings.store') }}" method="POST">
                    <div class="card-body">
                        @csrf
                        
                        @include('trainings.form')
                        
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('trainings.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection