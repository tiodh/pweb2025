<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teaching_lecturers extends Model
{
    /** @use HasFactory<\Database\Factories\TeachingLecturersFactory> */
    use HasFactory;

    protected $table = 'teaching_lecturers';

    protected $fillable = [
        'lecturer_id',
        'class_id',
        'teaching_status',
        'remarks',
    ];

    // Relasi ke tabel lecturers
    public function lecturers()
    {
        return $this->belongsTo(lecturers::class, 'lecturer_id');
    }

    // Relasi ke tabel classes
    public function classes()
    {
        return $this->belongsTo(classes::class, 'class_id');
    }
}
