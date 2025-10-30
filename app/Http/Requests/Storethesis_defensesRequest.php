<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storethesis_defensesRequest extends FormRequest
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
            'thesis_id' => ['required', 'exists:theses,id'],
            'room_id' => ['required', 'exists:rooms,id'],
            'defense_date' => ['required', 'date', 'after_or_equal:today'],
            'defense_status' => ['nullable', 'in:pending,approved,rejected'],
        ];
    }
}
