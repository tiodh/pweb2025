<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFacultyRequest extends FormRequest
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
        $facultyId = $this->route('faculty');
        return [
            'university_id' => 'required|exists:universities,id',
            'name' => 'required|string|max:255',
            'dean' => 'required|string|max:255',
            'faculty_code' => 'required|string|max:50|unique:faculties,faculty_code,' . $facultyId,
        ];
    }
}
