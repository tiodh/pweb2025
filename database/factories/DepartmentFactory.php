<?php

namespace Database\Factories;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'faculty_id' => Faculty::factory(),
            'name' => 'Jurusan ' . fake()->words(2, true),
            'department_code' => strtoupper(fake()->unique()->lexify('???')),
            'head_of_department' => fake()->name(),
        ];
    }
}
