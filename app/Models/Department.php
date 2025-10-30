<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;

    protected $fillable = [
        'faculty_id',
        'name',
        'department_code',
        'head_of_department'
    ];
    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }
}
