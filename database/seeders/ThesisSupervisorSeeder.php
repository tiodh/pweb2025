<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThesisSupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThesisSupervisor::firstOrCreate(
            [
                'theses_id'      => 1, 
                'lecturer_id'    => 1, 
                'role'           => 'pembimbing_utama', 
            ],
            [
                'approval_status' => 'approved',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ]
        );

        ThesisSupervisor::firstOrCreate(
            [
                'theses_id'      => 2, 
                'lecturer_id'    => 2, 
                'role'           => 'pembimbing_utama', 
            ],
            [
                'approval_status' => 'pending',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ]
        );
    }
}
