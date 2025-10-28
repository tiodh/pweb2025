<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TuitionFee;

class TuitionFeeSeeder extends Seeder
{
    public function run(): void
    {
        TuitionFee::create([
            'study_program_id' => 1,
            'semester' => 1,
            'amount' => 2500000,
            'payment_type' => 'SPP',
        ]);

        TuitionFee::create([
            'study_program_id' => 1,
            'semester' => 2,
            'amount' => 2600000,
            'payment_type' => 'SPP',
        ]);
    }
}