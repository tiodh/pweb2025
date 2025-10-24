<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Scholarship;

class ScholarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Scholarship::create([
            'name' => 'Beasiswa Bank Indonesia',
            'provider' => 'Bank Indonesia',
            'type' => 'Akademik',
            'period' => '2025/2026'
        ]);
        
        Scholarship::create([
            'name' => 'Djarum Beasiswa Plus',
            'provider' => 'Djarum Foundation',
            'type' => 'Soft Skill',
            'period' => '2025'
        ]);

        Scholarship::create([
            'name' => 'Beasiswa Unggulan',
            'provider' => 'Kemendikbud',
            'type' => 'Prestasi',
            'period' => '2025'
        ]);
    }
}