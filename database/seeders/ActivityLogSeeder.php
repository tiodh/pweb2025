<?php
use Illuminate\Database\Seeder;
use App\Models\ActivityLog;

class ActivityLogSeeder extends Seeder
{
    public function run(): void
    {
        ActivityLog::create([
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
