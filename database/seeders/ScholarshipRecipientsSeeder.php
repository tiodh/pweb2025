<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\scholarship_recipients;

class ScholarshipRecipientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        scholarship_recipients::firstOrCreate([
            'student_id' => 1,
            'scholarship_id' => 1,
            'year' => 2023,
            'status' => 'active',
        ]);

        scholarship_recipients::firstOrCreate([
            'student_id' => 2,
            'scholarship_id' => 1,
            'year' => 2024,
            'status' => 'inactive',
        ]);

        scholarship_recipients::firstOrCreate([
            'student_id' => 3,
            'scholarship_id' => 2,
            'year' => 2025,
            'status' => 'pending',
        ]);
    }
}
