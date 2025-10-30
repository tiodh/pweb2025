<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThesisSupervisor extends Model
{
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
