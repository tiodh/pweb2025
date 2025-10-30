<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\University;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faculty>
 */
class FacultyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'university_id' => University::inRandomOrder()->first()->id,
            'name' => 'Fakultas ' .fake()->words(2, true),
            'dean' => fake()->name(),
            'faculty_code' => strtoupper(fake()->unique()->lexify('???'))
        ];
    }
}
