<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\courses;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        courses::firstOrCreate(
            [
                'course_code' => 'IF201'
            ],
            [
                'name' => 'Pemrograman Web',
                'credits' => 3,
                'study_program_id' => 1,
            ]
        );

        courses::firstOrCreate(
            [
                'course_code' => 'IF202'
            ],
            [
                'name' => 'Basis Data',
                'credits' => 3,
                'study_program_id' => 1,
            ]
        );
    }
}
