<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theses; 
use App\Models\User; 

class ThesesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswaId = User::where('email', 'admin@pweb.com')->first()->id ?? 1;
        Theses::create([ 
            'user_id' => $mahasiswaId,
            'title'   => 'Implementasi Sistem Informasi Akademik Berbasis Web dengan Laravel',
            'year'    => 2024,
            'status'  => 'submission',
            'submission_date' => now(),
        ]);

        Theses::create([ 
            'user_id' => $mahasiswaId,
            'title'   => 'Analisis Data Penjualan Menggunakan Metode Data Mining',
            'year'    => 2025,
            'status'  => 'draft',
            'submission_date' => null,
        ]);

    }
}