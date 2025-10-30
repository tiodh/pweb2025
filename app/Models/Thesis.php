<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'title',
        'abstract',
        'status',
        'submission_date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}