<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Updatescholarship_recipientsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student_id' => 'required|numeric|exists:students,id',
            'scholarship_id' => 'required|numeric|exists:scholarships,id',
            'year' => 'required|numeric|digits:4|min:2020',
            'status' => [
                'required',
                'string',
                Rule::in(['active', 'inactive', 'graduated']),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'student_id.required' => 'Mahasiswa wajib dipilih.',
            'student_id.exists' => 'Mahasiswa yang dipilih tidak valid.',
            'scholarship_id.required' => 'Jenis beasiswa wajib dipilih.',
            'scholarship_id.exists' => 'Beasiswa yang dipilih tidak valid.',
            'year.required' => 'Tahun wajib diisi.',
            'year.digits' => 'Tahun harus 4 digit (contoh: 2024).',
            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status yang dipilih tidak valid.',
        ];
    }
}
