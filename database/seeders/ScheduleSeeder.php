<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\classes;
use App\Models\rooms;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classIds = classes::pluck('id');
        $roomIds = rooms::pluck('id');

        if ($classIds->isEmpty() || $roomIds->isEmpty()) {
            $this->command->error('Tabel classes atau rooms kosong. Jalankan seeder yang sesuai terlebih dahulu.');
            return;
        }

        for ($i = 0; $i < 5; $i++) {
            Schedule::create([
                'class_id' => $classIds->random(),
                'room_id' => $roomIds->random(),
                'day' => fake()->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']),
                'start_time' => fake()->time('H:i:s', '17:00:00'),
                'end_time' => fake()->time('H:i:s', '19:00:00'),
            ]);
        }
    }
}
