<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thesis_examiners extends Model
{
    /** @use HasFactory<\Database\Factories\ThesisExaminersFactory> */
    use HasFactory;
    protected $fillable = [
        'thesis_defense_id',
        'lecturer_id',
        'grade',
        'remarks',
    ];
}
