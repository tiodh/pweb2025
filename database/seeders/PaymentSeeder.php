<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Contoh sederhana: pastikan student id & tuition_fee id yang dipakai ada di DB
        if (DB::table('students')->count() && DB::table('tuition_fees')->count()) {
            $firstStudent = DB::table('students')->first();
            $firstTuition = DB::table('tuition_fees')->first();

            Payment::create([
                'student_id' => $firstStudent->id,
                'tuition_fee_id' => $firstTuition->id,
                'payment_date' => now()->toDateString(),
                'amount' => 1500000,
            ]);
        }
    }
}