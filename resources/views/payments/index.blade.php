@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Payments</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('payments.create') }}" class="btn btn-primary mb-3">Add Payment</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student</th>
                <th>Tuition Fee</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($payments as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->student->name ?? 'N/A' }}</td>
                <td>
                    @if($p->tuitionFee)
                    {{ $p->tuitionFee->name ?? 'N/A' }}
                    - Rp{{ number_format($p->tuitionFee->amount ?? 0, 0, ',', '.') }}
                    @else
                    N/A
                    @endif
                </td>
                <td>{{ $p->payment_date?->format('Y-m-d') ?? '-' }}</td>
                <td>Rp{{ number_format($p->amount ?? 0, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('payments.show', $p) }}" class="btn btn-sm btn-info">Show</a>
                    <a href="{{ route('payments.edit', $p) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('payments.destroy', $p) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus pembayaran ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No payments found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $payments->links() }}
</div>
@endsection