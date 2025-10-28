@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Payment #{{ $payment->id }}</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('payments.update', $payment) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="student_id" class="form-label">Student</label>
            <select name="student_id" id="student_id" class="form-control" required>
                <option value="">-- Pilih Student --</option>
                @foreach($students as $s)
                <option value="{{ $s->id }}" {{ (old('student_id', $payment->student_id) == $s->id) ? 'selected' : '' }}>{{ $s->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tuition_fee_id" class="form-label">Tuition Fee</label>
            <select name="tuition_fee_id" id="tuition_fee_id" class="form-control" required>
                <option value="">-- Pilih Tuition Fee --</option>
                @foreach($tuitionFees as $t)
                <option value="{{ $t->id }}" {{ (old('tuition_fee_id', $payment->tuition_fee_id) == $t->id) ? 'selected' : '' }}>
                    {{ $t->id }} - {{ $t->amount ?? '' }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="payment_date" class="form-label">Payment Date</label>
            <input type="date" name="payment_date" id="payment_date" class="form-control" value="{{ old('payment_date', $payment->payment_date->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" id="amount" class="form-control" value="{{ old('amount', $payment->amount) }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection