<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\thesis_defenses;
use App\Models\Thesis;
use App\Models\rooms;

class ThesisDefensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $thesis = Thesis::first();
        $room = Room::first();

        // menghentikan seeding semisal ada yang ngga ada biar ga error
        if (!$thesis || !$room) {
            $this->command->warn('Tidak ada data Thesis atau Room. ThesisDefensesSeeder dilewati.');
            return;
        }

        thesis_defenses::firstOrCreate([
            'thesis_id' => $thesis->id,
            'room_id' => $room->id,
            'defense_date' => Carbon::now()->addDays(3)->toDateString(),
            'defense_status' => 'pending',
        ]);
    }
}
