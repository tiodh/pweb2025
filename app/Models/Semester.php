<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    /** @use HasFactory<\Database\Factories\SemesterFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'academic_year',
        'order',
        'status',
    ];
    public function academic_years()
    {
        return $this->belongsTo(academic_years::class, 'academic_year');

    }
}
