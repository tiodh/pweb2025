<?php

namespace Database\Seeders;

use App\Models\rooms;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        rooms::factory()->count(10)->create();
    }
}
