<?php

namespace Database\Seeders;

use App\Models\AcademicGuidance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicGuidanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcademicGuidance::create([
            'student_id' => 1,
            'lecturer_id' => 1,
            'date' => '2025-10-01',
            'notes' => 'Bimbingan awal mengenai proposal skripsi.',
        ]);

        AcademicGuidance::create([
            'student_id' => 1,
            'lecturer_id' => 2,
            'date' => '2025-10-10',
            'notes' => 'Diskusi lanjutan tentang metodologi penelitian.',
        ]);
    }
}
