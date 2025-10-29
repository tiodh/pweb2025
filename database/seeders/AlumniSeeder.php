<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Alumni;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Student::count() > 0) {
            Alumni::create([
                'student_id' => Student::first()->id,
                'graduation_year' => '2024',
                'occupation' => 'Software Engineer',
                'company' => 'Company',
            ]);
        } else {
             $this->command->warn('Tidak ada data student.');
        }
    }
}
