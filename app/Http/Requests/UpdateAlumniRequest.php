<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlumniRequest extends FormRequest
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
            'student_id' => 'required|exists:students,id|unique:alumni,student_id' . (isset($this->alumni) ? ',' . $this->alumni->id : ''),
            'graduation_year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'occupation' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
        ];
    }
}
