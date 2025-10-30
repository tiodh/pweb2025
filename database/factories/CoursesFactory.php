<?php

namespace Database\Factories;

use App\Models\StudyProgram;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\courses>
 */
class CoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_code' => strtoupper(fake()->unique()->bothify('??-###')),
            'name' => fake()->sentence(3),
            'credits' => fake()->numberBetween(1, 4),
            'study_program_id' => StudyProgram::factory(),
        ];
    }
}
