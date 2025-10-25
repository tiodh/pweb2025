<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;

    protected $table = 'academic_years';

    protected $fillable = [
        'start_year',
        'end_year',
        'active_status',
        'notes',
    ];

    public function semesters()
    {
        return $this->hasMany(Semester::class);
    }
}
