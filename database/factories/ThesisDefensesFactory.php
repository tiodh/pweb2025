<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Thesis; // sesuaiiinnn
use App\Models\rooms;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\thesis_defenses>
 */
class ThesisDefensesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'thesis_id' => Thesis::factory(),
            'room_id' => Room::factory(),
            'defense_date' => $this->faker->dateTimeBetween('+1 minggu', '+3 bulan'),
            'defense_status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
