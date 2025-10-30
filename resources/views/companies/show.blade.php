@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company Details') }}</div>

                <div class="card-body">
                    <div class="form-group mb-3">
                        <label><strong>Name:</strong></label>
                        <p>{{ $company->name }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Address:</strong></label>
                        <p>{{ $company->address }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Contact:</strong></label>
                        <p>{{ $company->contact }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Email:</strong></label>
                        <p>{{ $company->email }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Created At:</strong></label>
                        <p>{{ $company->created_at->format('d-M-Y H:i:s') }}</p>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Updated At:</strong></label>
                        <p>{{ $company->updated_at->format('d-M-Y H:i:s') }}</p>
                    </div>

                    <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back to List</a>
                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
