<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CourseRegistration;

class CourseRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseRegistration::firstOrCreate([
            'registration_id' => $registration->id,
            'class_id' => $class->id,
            'registration_date' => Carbon::now()->toDateString(),
            'validation_status' => 'pending',
        ]);
    }
}
