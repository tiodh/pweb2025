<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicGuidance extends Model
{
    protected $fillable = [
    'student_id',
    'lecturer_id',
    'date',
    'notes',
    ];

}
