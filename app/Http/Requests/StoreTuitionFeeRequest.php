<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTuitionFeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'study_program_id' => ['required', 'exists:study_programs,id'], // Harus ada & pastikan FK valid
            'semester' => ['required', 'integer', 'min:1', 'max:16'],
            'amount' => ['required', 'numeric', 'min:100000', 'max:9999999999'], // Batas maksimum sesuai decimal(12, 2)
            'payment_type' => ['required', 'string', 'max:50'],
        ];
    }
}
