<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\lecturers;
use App\Models\StudyProgram;

class LecturersSeeder extends Seeder
{
    public function run(): void
    {
        $informatika = StudyProgram::where('name', 'Informatika')->first();
        $sistemInformasi = StudyProgram::where('name', 'Sistem Informasi')->first();

        if (!$informatika || !$sistemInformasi) {
            echo "❌ Study program belum ada. Jalankan StudyProgramSeeder dulu!\n";
            return;
        }

        lecturers::create([
            'nim' => 'L001',
            'name' => 'Dr. Rendra Saputra',
            'cohort_year' => 2010,
            'study_program_id' => $informatika->id,
        ]);

        lecturers::create([
            'nim' => 'L002',
            'name' => 'Ir. Dwi Nirmala, M.Kom',
            'cohort_year' => 2012,
            'study_program_id' => $informatika->id,
        ]);

        lecturers::create([
            'nim' => 'L003',
            'name' => 'Dr. Sinta Wardhani',
            'cohort_year' => 2011,
            'study_program_id' => $sistemInformasi->id,
        ]);

        lecturers::create([
            'nim' => 'L004',
            'name' => 'Agus Ramadhan, S.Kom., M.T.',
            'cohort_year' => 2013,
            'study_program_id' => $sistemInformasi->id,
        ]);
    }
}
