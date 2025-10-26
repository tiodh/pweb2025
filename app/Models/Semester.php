<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'academic_year',
        'order',
        'status',
    ];

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);

    }
}
