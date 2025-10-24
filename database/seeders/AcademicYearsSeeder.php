<?php

namespace Database\Seeders;

use App\Models\academic_years;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicYearsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        academic_years::firstorcreate([
            'start_year' => 2024,
            'end_year' => 2025,
        ], [
            'active_status' => true,
            'notes' => 'Tahun ajaran aktif saat ini',
        ]);
    }
}
