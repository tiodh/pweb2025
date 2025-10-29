<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Thesis; // tolong sesuaiin yah
use App\Models\rooms;   // ini juga

class thesis_defenses extends Model
{
    use HasFactory;

    protected $table = 'thesis_defenses';

    protected $fillable = [
        'thesis_id',
        'defense_date',
        'room_id',
        'defense_status',
    ];

    public function thesis()
    {
        return $this->belongsTo(Thesis::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
