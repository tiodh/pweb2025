<?php

namespace Database\Factories;

use App\Models\classes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseRegistration>
 */
class CourseRegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration_id' => Registration::factory(),
            'class_id' => classes::factory(),
            'registration_date' => $this->faker->date(),
            'validation_status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
