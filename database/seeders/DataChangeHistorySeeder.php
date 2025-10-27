<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DataChangeHistory;

class DataChangeHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataChangeHistory::firstorcreate([
            'user_id' => 1,
            'affected_table' => 'students',
            'action' => 'insert',
            'change_timestamp' => now(),
        ]);

        DataChangeHistory::create([
            'user_id' => 1,
            'affected_table' => 'lecturers',
            'action' => 'update',
            'change_timestamp' => now(),
        ]);
    }
}
