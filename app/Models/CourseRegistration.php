<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
    /** @use HasFactory<\Database\Factories\CourseRegistrationFactory> */
    use HasFactory;

    protected $fillable = [
        'registration_id',
        'class_id',
        'registration_date',
        'validation_status',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function class()
    {
        return $this->belongsTo(classes::class, 'class_id');
    }
}
