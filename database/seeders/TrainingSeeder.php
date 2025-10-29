<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Training;
use Illuminate\Support\Carbon;
class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Training::firstOrCreate([
                'name' => 'Pelatihan Dasar Koding Linuk',
                'provider' => 'Admin Loh Rek',
                'start_date' => Carbon::parse('2025-11-10 09:00:00'),
                'end_date' => Carbon::parse('2025-11-12 17:00:00'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        Training::firstOrCreate([
            'name' => 'Belajar Laravel 1999',
            'provider' => 'Falah Dev Indonesia',
            'start_date' => Carbon::parse('2025-11-15 09:00:00'),
            'end_date' => Carbon::parse('2025-11-16 17:00:00'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Training::firstOrCreate([ 
            'name' => 'Kecerdasan Buatan Bersama Admin',
            'provider' => 'Admin PWEB 1945',
            'start_date' => Carbon::parse('2025-11-20 08:30:00'),
            'end_date' => Carbon::parse('2025-11-22 16:30:00'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
