<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CourseRegistration;
use App\Models\classes;
use Carbon\Carbon;

class CourseRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $class = classes::inRandomOrder()->first();

        if ($class) {
            CourseRegistration::firstOrCreate(
                [
                    'class_id' => $class->id,
                ],
                [
                    'registration_date' => Carbon::now()->toDateString(),
                    'validation_status' => 'pending',
                ]
            );
        }
    }
}
