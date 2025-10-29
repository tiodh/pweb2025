<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
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
            'course_registration_id' => 'required|exists:course_registrations,id',
            'numeric_grade' => 'required|numeric|min:0|max:100',
            'letter_grade' => 'required|string|max:3',
            'input_date' => 'nullable|date',
        ];
    }
}
