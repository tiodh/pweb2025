<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(Lecturer::class, 'advisor_id');
    }

    public function members()
    {
        return $this->hasMany(OrganizationMember::class, 'organization_id');
    }
}
