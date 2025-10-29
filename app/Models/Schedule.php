<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleFactory> */
    use HasFactory;

    protected $fillable = [
        'class_id',
        'room_id',
        'day',
        'start_time',
        'end_time',
    ];
    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id'); 
    }
    public function room(): BelongsTo
    {
        return $this->belongsTo(rooms::class, 'room_id');
    }
}
