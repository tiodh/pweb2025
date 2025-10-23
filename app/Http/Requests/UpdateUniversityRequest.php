<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUniversityRequest extends FormRequest
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
        $university = $this->route('university');
        return [
            'name' => 'required|string|min:3|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:15|regex:/^[0-9]+$/',
            'email' => [
                'required',
                'email',
                Rule::unique('universities', 'email')->ignore($university),
            ],
        ];
    }
}
