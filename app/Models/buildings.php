<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buildings extends Model
{
    protected $fillable = [
        'name',
        'location',
        'floors',
        'building_code',
    ];
}
