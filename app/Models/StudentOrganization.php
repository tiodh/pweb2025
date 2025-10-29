<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class StudentOrganization extends Model
{
    use HasFactory;
    
    protected $table = 'student_organizations';

    protected $fillable = [
        'name',
        'type',
        'established_year',
        'advisor_id',
    ];

    public function advisor()
    {
        return $this->belongsTo(lecturers::class, 'advisor_id');
    }
}
