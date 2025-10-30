<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    /** @use HasFactory<\Database\Factories\GradeFactory> */
    use HasFactory;

    protected $fillable = [
        'course_registration_id',
        'numeric_grade',
        'letter_grade',
        'input_date',
    ];

    public function courseRegistration()
    {
        return $this->belongsTo(CourseRegistration::class);
    }
}
