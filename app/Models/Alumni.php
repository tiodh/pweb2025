<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    /** @use HasFactory<\Database\Factories\AlumniFactory> */
    use HasFactory;

    protected $fillable = [
        'student_id',
        'graduation_year',
        'occupation',
        'company',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
