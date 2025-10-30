<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThesisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::inRandomOrder()->first()->id ?? Student::factory(),
            'title' => $this->faker->sentence(6),
            'abstract' => $this->faker->paragraph(3),
            'status' => $this->faker->randomElement(['proposed', 'in_progress', 'completed', 'failed']),
            'submission_date' => $this->faker->optional()->date(),
        ];
    }
}