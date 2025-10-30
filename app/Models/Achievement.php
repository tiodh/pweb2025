<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'student_id',
    ];
    
    /** @use HasFactory<\Database\Factories\AchievementFactory> */
    use HasFactory;
}
