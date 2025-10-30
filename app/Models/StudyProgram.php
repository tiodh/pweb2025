<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    /** @use HasFactory<\Database\Factories\StudyProgramFactory> */
    use HasFactory;
    protected $table = 'study_programs';

    protected $fillable = [
        'department_id',
        'name',
        'degree_level',
        'accreditation',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function lecturers()
    {
        return $this->hasMany(lecturers::class, 'study_program_id');
    }
}
