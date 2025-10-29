<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade;
use App\Models\CourseRegistration;
use Carbon\Carbon;

class GradeSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel grades.
     */
    public function run(): void
    {
        // Ambil satu data course registration (pastikan sudah ada di database)
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
