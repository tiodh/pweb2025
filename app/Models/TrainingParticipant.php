<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TrainingParticipant extends Model
{
    /** @use HasFactory<\Database\Factories\TrainingParticipantFactory> */
    use HasFactory;

    protected $fillable = [
        'student_id',
        'training_id',
        'attendance_status',
        'certificate',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
