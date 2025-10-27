<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataChangeHistory>
 */
class DataChangeHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'user_id' => UserFactory::inRandomOrder()->first()?->id ?? 1, // fallback ke id=1
            'affected_table' => $this->faker->randomElement([
                'students', 'lecturers', 'courses', 'grades', 'registrations'
            ]),
            'action' => $this->faker->randomElement(['insert', 'update', 'delete']),
            'change_timestamp' => $this->faker->dateTimeThisYear(),
        ];
    }
}
