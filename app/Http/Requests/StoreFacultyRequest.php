<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreFacultyRequest extends FormRequest {
    public function authorize(): bool { 
        return true; 
    }

    public function rules(): array {
        return [
            'university_id' => 'required|exists:universities,id',
            'name' => 'required|string|max:255',
            'dean' => 'required|string|max:255',
            'faculty_code' => 'required|string|max:50|unique:faculties,faculty_code',
        ];
    }
}