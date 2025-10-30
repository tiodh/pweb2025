<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class Storethesis_supervisorRequest extends FormRequest
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
            'lecturer_id' => 'required|integer|exists:lecturers,id',

            'theses_id' => 'required|integer|exists:theses,id',
            
            'role' => 'required|string|max:50', 
            'approval_status' => [
                'nullable', 
                'string', 
                Rule::in(['pending', 'approved', 'rejected']) 
            ],
        ];
    }
}
