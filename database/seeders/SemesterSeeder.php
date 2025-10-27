<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Semester;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Semester::firstorcreate([
            'name' => 'Ganjil 2025/2026',
            'academic_year' => 1, 
            'status' => 'aktif',
            'order' => 1,
        ]);

        // Semester::create([
        //     'name' => 'Genap 2025/2026',
        //     'academic_year' => ,
        //     'status' => 'non-aktif',
        //     'order' => 2,
        // ]);
    }
}
