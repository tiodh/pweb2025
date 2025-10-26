@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Activity Logs</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Action</th>
                <th>IP Address</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $index => $log)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $log->user->name }}</td>
                <td>{{ $log->action }}</td>
                <td>{{ $log->ip_address }}</td>
                <td>{{ $log->timestamp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
