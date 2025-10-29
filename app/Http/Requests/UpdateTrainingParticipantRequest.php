<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property \App\Models\TrainingParticipant|null $training_participant
 * @method mixed input(string $key = null, $default = null)
 * @method mixed route(string|null $param = null)
 */

class UpdateTrainingParticipantRequest extends FormRequest
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
        $trainingParticipantId = optional($this->route('training-participant'))->id;
        return [
            'student_id' => [
                'required',
                'exists:students,id',
                Rule::unique('training_participants')
                    ->ignore($trainingParticipantId)
                    ->where(fn($query) => $query->where('training_id', $this->input('training_id'))),
            ],
            'training_id' => 'required|exists:trainings,id',
            'attendance_status' => 'required|string|in:Hadir,Absen,Izin|max:50',
            'certificate' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'student_id.unique' => 'Mahasiswa ini sudah terdaftar sebagai peserta pada pelatihan yang sama.',
            'student_id.required' => 'Mahasiswa wajib dipilih.',
            'training_id.required' => 'Pelatihan wajib dipilih.',
            'attendance_status.required' => 'Status kehadiran wajib diisi.',
            'attendance_status.in' => 'Status kehadiran harus salah satu dari: Hadir, Absen, Izin.',
        ];
    }
}
