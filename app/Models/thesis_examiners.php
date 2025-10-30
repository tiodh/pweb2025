<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\thesis_defenses;

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

        public function thesisDefense()
    {
        return $this->belongsTo(thesis_defenses::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(lecturers::class);
    }
}
