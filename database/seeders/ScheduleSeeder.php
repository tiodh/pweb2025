<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::create([
            'class_id' => 1,
            'room_id' => 1,
            'day' => 'Senin',
            'start_time' => '08:00:00',
            'end_time' => '09:40:00',
        ]);
        Schedule::create([
            'class_id' => 2,
            'room_id' => 3,
            'day' => 'Rabu',
            'start_time' => '10:00:00',
            'end_time' => '11:40:00',
        ]);
        Schedule::create([
            'class_id' => 1,
            'room_id' => 1,
            'day' => 'Kamis',
            'start_time' => '14:00:00',
            'end_time' => '15:40:00',
        ]);
    }
}
