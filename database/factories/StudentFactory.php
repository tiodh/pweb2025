<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\StudyProgram;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => fake()->unique()->numerify('2###########'),
            'name' => fake()->name(),
            'cohort_year' => fake()->numberBetween(2020, 2025),
            'study_program_id' => StudyProgram::factory(),
        ];
    }
}
