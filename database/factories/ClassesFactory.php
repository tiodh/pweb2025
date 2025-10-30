<?php

namespace Database\Factories;

use App\Models\courses;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\classes>
 */
class ClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => courses::inRandomOrder()->first()->id,
            'class_name' => 'Kelas ' . fake()->randomElement(['A', 'B', 'C']),
            'semester' => fake()->numberBetween(1, 8),
            'academic_year' => fake()->year(),
        ];
    }
}
