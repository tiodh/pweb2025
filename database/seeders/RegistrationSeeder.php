<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registration;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        Registration::create([
            'student_id' => 1,
            'semester' => 'Ganjil',
            'academic_year' => '2025/2026',
            'status' => 'Aktif',
        ]);

        Registration::create([
            'student_id' => 2,
            'semester' => 'Genap',
            'academic_year' => '2024/2025',
            'status' => 'Nonaktif',
        ]);
    }
}
