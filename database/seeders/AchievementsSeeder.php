<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('achievements')->insert([
        [
            'title' => 'Juara 1 Lomba Coding',
            'description' => 'Menang kompetisi coding tingkat kampus',
            'date' => '2025-05-01',
            'student_id' => '1',
        ],
        [
            'title' => 'Finalis Hackathon Nasional',
            'description' => 'Masuk 10 besar kompetisi nasional',
            'date' => '2025-07-15',
            'student_id' => '2',
        ],
    ]);
}

}
