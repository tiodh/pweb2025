<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\StudyProgram;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         if (StudyProgram::count() === 0) {
            $this->command->warn('Tidak ada data StudyProgram! Jalankan StudyProgramSeeder dulu.');
            return;
        }
        Student::factory(10)->create();
    }
}
