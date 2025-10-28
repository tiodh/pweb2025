<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

     protected $fillable = [
        'nim',
        'name',
        'cohort_year',
        'study_program_id',
    ];

     public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class);
    }
}
