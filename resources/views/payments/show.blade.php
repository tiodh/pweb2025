@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Payment #{{ $payment->id }}</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $payment->id }}</td>
        </tr>
        <tr>
            <th>Student</th>
            <td>{{ $payment->student->name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Tuition Fee</th>
            <td>{{ $payment->tuitionFee->id ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Payment Date</th>
            <td>{{ $payment->payment_date->format('Y-m-d') }}</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>{{ number_format($payment->amount, 2) }}</td>
        </tr>
    </table>

    <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('payments.edit', $payment) }}" class="btn btn-warning">Edit</a>
</div>
@endsection