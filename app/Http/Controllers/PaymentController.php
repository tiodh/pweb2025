<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use App\Models\TuitionFee;
use App\Http\Requests\StorePaymentRequest;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['student', 'tuitionFee'])->orderBy('payment_date', 'desc')->paginate(15);
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $students = Student::orderBy('name')->get();
        $tuitionFees = TuitionFee::orderBy('id')->get();
        return view('payments.create', compact('students', 'tuitionFees'));
    }

    public function store(StorePaymentRequest $request)
    {
        Payment::create($request->validated());
        return redirect()->route('payments.index')->with('success', 'Payment added successfully.');
    }

    public function show(Payment $payment)
    {
        $payment->load(['student', 'tuitionFee']);
        return view('payments.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
        $students = Student::orderBy('name')->get();
        $tuitionFees = TuitionFee::orderBy('id')->get();
        return view('payments.edit', compact('payment', 'students', 'tuitionFees'));
    }

    public function update(StorePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->validated());
        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}