<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentAccount extends Model
{
    /** @use HasFactory<\Database\Factories\StudentAccountFactory> */
    use HasFactory;

    protected $fillable = [
        "user_id",
        "student_id",
        "status",
        "last_login",
    ];

    protected $casts = [
        "last_login"=> "datetime",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}