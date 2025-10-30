<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ActivityLog;

class ActivityLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ActivityLog::firstorcreate([
            'user_id' => 1,
            'action' => 'Login ke sistem',
            'ip_address' => '192.168.0.1',
            'timestamp' => now(),
        ]);

        ActivityLog::create([
            'user_id' => 1,
            'action' => 'Menambah data mahasiswa',
            'ip_address' => '192.168.0.1',
            'timestamp' => now(),
        ]);
    }
}
