<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storeacademic_yearsRequest extends FormRequest
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
    //  * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
    //  */
    public function rules(): array
    {
        return [
            'start_year' => 'required|integer|min:2000|max:2100',
            'end_year' => 'required|integer|gt:start_year|max:2100',
            'active_status' => 'boolean',
            'notes' => 'nullable|string|max:255',
        ];
    }
}
