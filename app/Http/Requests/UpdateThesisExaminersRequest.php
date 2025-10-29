<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateThesisExaminersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $thesis_examiners = $this->route('thesis-examiners');
        return [
            'thesis_defense_id' => 'required|exists:thesis_defenses,id',
            'lecturer_id'       => 'required|exists:lecturers,id',
            'grade'             => 'required|numeric|min:0|max:100',
            'remarks'           => 'nullable|string|max:1000',
        ];
    }
}
