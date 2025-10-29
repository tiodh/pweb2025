<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentAccount>
 */
class StudentAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'student_id' => Student::factory(),
            'status' => fake()->randomElement(['active', 'inactive', 'suspended']),
            'last_login' => fake()->dateTimeThisYear(),
        ];
    }
}
