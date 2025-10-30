<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storeteaching_lecturersRequest extends FormRequest
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
}
