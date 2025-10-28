<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'student_id' => 'required|exists:students,id',
            'tuition_fee_id' => 'required|exists:tuition_fees,id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ];
    }

    public function attributes()
    {
        return [
            'student_id' => 'student',
            'tuition_fee_id' => 'tuition fee',
            'payment_date' => 'tanggal pembayaran',
            'amount' => 'jumlah',
        ];
    }
}