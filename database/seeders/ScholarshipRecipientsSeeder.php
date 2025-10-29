<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ScholarshipRecipient;

class ScholarshipRecipientsSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        ScholarshipRecipient::firstOrCreate([
            'student_id' => 1,
            'scholarship_id' => 1,
            'year' => 2023,
            'status' => 'active',
        ]);

        ScholarshipRecipient::firstOrCreate([
            'student_id' => 2,
            'scholarship_id' => 1,
            'year' => 2024,
            'status' => 'inactive',
        ]);

        ScholarshipRecipient::firstOrCreate([
            'student_id' => 3,
            'scholarship_id' => 2,
            'year' => 2025,
            'status' => 'pending',
        ]);
    }
}
