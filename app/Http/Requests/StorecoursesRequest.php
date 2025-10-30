<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecoursesRequest extends FormRequest
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
            'course_code' => 'required|string|min:3|max:255|unique:courses,course_code',
            'name' => 'required|string|min:3|max:255',
            'credits' => 'required|integer|min:1|max:10',
            'study_program_id' => 'required|integer|exists:study_programs,id',
        ];
    }
}
