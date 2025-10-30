<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAcademicGuidanceRequest extends FormRequest
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
            'student_id'   => 'required|exists:students,id',
            'lecturer_id'  => 'required|exists:lecturers,id',
            'date'         => 'required|date',
            'notes'        => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'student_id.required'  => 'Mahasiswa harus dipilih.',
            'lecturer_id.required' => 'Dosen pembimbing harus dipilih.',
            'date.required'        => 'Tanggal bimbingan wajib diisi.',
            'date.date'            => 'Format tanggal tidak valid.',
        ];
    }
}
