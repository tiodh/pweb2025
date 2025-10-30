<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\grade;
use App\Models\CourseRegistration;
use Illuminate\Support\Carbon;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courseRegistration = CourseRegistration::first();

        // Jika belum ada, beri peringatan di terminal
        if (!$courseRegistration) {
            $this->command->warn('⚠️ Tidak ada data CourseRegistration! Jalankan CourseRegistrationSeeder terlebih dahulu.');
            return;
        }

        // Buat atau ambil data grade
        Grade::firstOrCreate([
            'course_registration_id' => $courseRegistration->id,
        ], [
            'numeric_grade' => 88,
            'letter_grade' => 'A',
            'input_date' => Carbon::now()->toDateString(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->command->info('Data Grade berhasil ditambahkan.');
    }
}
