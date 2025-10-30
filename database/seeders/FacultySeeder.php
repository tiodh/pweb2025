<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $university = University::first();
        if ($university) {
            Faculty::create([
                'university_id' => $university->id,
                'name' => 'Fakultas Ilmu Komputer',
                'dean' => 'Dr. Budi Hartono, S.Kom., M.Cs.',
                'faculty_code' => 'FILKOM'
            ]);
        }
    }
}
