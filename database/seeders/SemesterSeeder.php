<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Semester;

class SemesterSeeder extends Seeder
{
    public function run(): void
    {
        Semester::create([
            'name' => 'Ganjil 2025/2026',
            'academic_year_id' => 1, // pastikan ID ini ada di tabel academic_years
            'status' => 'aktif',
            'order' => 1,
        ]);

        Semester::create([
            'name' => 'Genap 2025/2026',
            'academic_year_id' => 1,
            'status' => 'non-aktif',
            'order' => 2,
        ]);
    }
}
