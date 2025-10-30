<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thesis_supervisor extends Model
{
    /** @use HasFactory<\Database\Factories\ThesisSupervisorFactory> */
    use HasFactory;

    protected $fillable = [
        'theses_id',
        'lecturer_id',
        'role',
        'approval_status',
    ];

    public function Theses(){
        return $this->belongsTo(theses::class,'theses_id');
    }

    public function Lecturers(){
        return $this->belongsTo(lecturers::class,'lecturer_id');
    }
}
