<?php

namespace App\Models;

use App\Models\StudyProgram; # buat connect ke studyprogram
use App\Models\Payment; # buat connect ke payment

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionFee extends Model
{
    use HasFactory;

    protected $table = 'tuition_fees';

    protected $fillable = [
        'study_program_id', // ini buat fk dari program studi
        'semester',
        'amount',
        'payment_type',
        'created_at',
        'updated_at',
    ];

    // biaya kuliah (1) : program studi (1)
    public function studyProgram() {
        return $this->belongsTo(StudyProgram::class);
    }

    // biaya kuliah (1) : payment (M)
    public function payments()
    {
        return $this->hasMany(Payment::class, 'tuition_fee_id');
    }
}
