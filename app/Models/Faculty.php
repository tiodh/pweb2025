<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    /** @use HasFactory<\Database\Factories\FacultyFactory> */
    use HasFactory;
    protected $fillable = [
        'university_id', 'name', 'dean', 'faculty_code',
    ];
    public function university(): BelongsTo {
        return $this->belongsTo(University::class);
    }
}

