<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class theses extends Model
{
    protected $fillable = [
        'title',
        'status',
        'submission_date'
    ];

    public function ThesisSupervisors()
    {
        return $this->hasMany(ThesisSupervisor::class, 'theses_id');
    }
    
    public function setContainer($container = null)
    {
        return $this; 
    }
    
    public function setCommand($command = null)
    {
        return $this; 
    }
    
    public function __invoke()
    {
        return $this; 
    }
}
