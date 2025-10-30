<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudyProgram;

class StudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudyProgram::firstOrCreate([
            'name' => 'Informatika',
            'degree_level' => 'S1',
            'accreditation' => 'A',
        ]);

        StudyProgram::firstOrCreate([
            'name' => 'Sistem Informasi',
            'degree_level' => 'S1',
            'accreditation' => 'B',
        ]);

        StudyProgram::firstOrCreate([
            'name' => 'Teknik Komputer',
            'degree_level' => 'D3',
            'accreditation' => 'A',
        ]);
    }
}
