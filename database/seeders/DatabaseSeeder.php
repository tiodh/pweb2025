<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UniversitySeeder;
use Database\Seeders\ScholarshipSeeder;
use Database\Seeders\AcademicYearsSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@pweb.com',
        ]);

        $this->call([
            UniversitySeeder::class,
            ScholarshipSeeder::class,
            AcademicYearsSeeder::class,
        ]);
    }
}
