<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updateteaching_lecturersRequest extends FormRequest
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
            'lecturer_id' => 'required|exists:lecturer,id',
            'class_id' => 'required|exists:class,id',
            'teaching_status' => 'required|string|in:active,inactive',
            'remarks' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'lecturer_id.required' => 'Lecturer harus dipilih.',
            'lecturer_id.exists' => 'Lecturer tidak valid.',

            'class_id.required' => 'Class harus dipilih.',
            'class_id.exists' => 'Class tidak valid.',

            'teaching_status.required' => 'Status pengajaran wajib diisi.',
            'teaching_status.in' => 'Status harus active atau inactive.',
        ];
    }
}
