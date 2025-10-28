<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\StudyProgram;

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
            'nim' => $this->faker->unique()->numerify('2025#####'),
            'name' => $this->faker->name(),
            'cohort_year' => $this->faker->year(),
            'study_program_id' => StudyProgram::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
