<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataChangeHistoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? 1, // fallback ke id=1
            'affected_table' => $this->faker->randomElement([
                'students', 'lecturers', 'courses', 'grades', 'registrations'
            ]),
            'action' => $this->faker->randomElement(['insert', 'update', 'delete']),
            'change_timestamp' => $this->faker->dateTimeThisYear(),
        ];
    }
}
