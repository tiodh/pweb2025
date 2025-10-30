@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Manage Companies') }}</div>

                <div class="card-body">
                    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">
                        Create New Company
                    </a>

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->address }}</td>
                                    <td>{{ $company->contact }}</td>
                                    <td>{{ $company->email }}</td>
                                    <td>
                                        <a href="{{ route('companies.show', $company->id) }}" class="btn btn-info btn-sm">Show</a>
                                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection