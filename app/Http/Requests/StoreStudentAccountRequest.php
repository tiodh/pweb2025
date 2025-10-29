<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStudentAccountRequest extends FormRequest
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
            'user_id' => ['required','integer',Rule::exists('users','id'), Rule::unique('student_accounts', 'user_id')],
            'student_id' => ['required','integer', Rule::exists('students','id'), Rule::unique('student_accounts', 'student_id')],
            'status' => ['required', 'string', Rule::in(['active','inactive','suspended'])],
            'last_login' => ['nullable','date'],
        ];
    }
}
