<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UpdateFacultyRequest extends FormRequest {
    public function authorize(): bool { 
        return true; 
    }

    public function rules(): array {
        $facultyId = $this->route('faculty');
        return [
            'university_id' => 'required|exists:universities,id',
            'name' => 'required|string|max:255',
            'dean' => 'required|string|max:255',
            'faculty_code' => 'required|string|max:50|unique:faculties,faculty_code,' . $facultyId,
        ];
    }
}