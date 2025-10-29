<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // nunggu pliss ini class sama regitration
        CourseRegistration::firstOrCreate([
            'registration_id' => $registration->id,
            'class_id' => $class->id,
            'registration_date' => Carbon::now()->toDateString(),
            'validation_status' => 'pending',
        ]);
    }
}
