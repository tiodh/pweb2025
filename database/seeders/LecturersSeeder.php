<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\lecturers;
use App\Models\StudyProgram;

class LecturersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $informatika = StudyProgram::where('name', 'Informatika')->first();
        $sistemInformasi = StudyProgram::where('name', 'Sistem Informasi')->first();

        lecturers::create([
            'nim' => 'L001',
            'name' => 'Dr. Rendra Saputra',
            'cohort_year' => 2010,
            'study_program_id' => $informatika->id,
        ]);

        Lecturers::create([
            'nim' => 'L002',
            'name' => 'Ir. Dwi Nirmala, M.Kom',
            'cohort_year' => 2012,
            'study_program_id' => $informatika->id,
        ]);

        Lecturers::create([
            'nim' => 'L003',
            'name' => 'Dr. Sinta Wardhani',
            'cohort_year' => 2011,
            'study_program_id' => $sistemInformasi->id,
        ]);

        Lecturers::create([
            'nim' => 'L004',
            'name' => 'Agus Ramadhan, S.Kom., M.T.',
            'cohort_year' => 2013,
            'study_program_id' => $sistemInformasi->id,
        ]);
    }
}
