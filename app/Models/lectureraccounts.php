<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lectureraccounts extends Model
{
    /** @use HasFactory<\Database\Factories\LectureraccountsFactory> */
    use HasFactory;

    protected $table = 'lecturer_accounts';
//  @var array
    protected $fillable = [
        'user_id',
        'lecturer_id',
        'status',
        'last_login',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function lecturer()
    {
        return $this->belongsTo(lecturers::class, 'lecturer_id');
    }
}
