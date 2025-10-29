<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lecturers extends Model
{
    /** @use HasFactory<\Database\Factories\LecturersFactory> */
    use HasFactory;

    protected $table = 'lecturers';

    protected $fillable = [
        'nim',
        'name',
        'cohort_year',
        'study_program_id',
    ];

    
    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class, 'study_program_id');
    }

    public function studentOrganizations()
    {
        return $this->hasMany(StudentOrganization::class, 'advisor_id');
    }
}
