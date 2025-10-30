<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 

class scholarship_recipients extends Model
{
    /** @use HasFactory<\Database\Factories\ScholarshipRecipientsFactory> */
    use HasFactory;
    
    protected $fillable = [
        'student_id',
        'scholarship_id',
        'year',
        'status',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
    public function scholarship(): BelongsTo
    {
        return $this->belongsTo(Scholarship::class);
    }
}
