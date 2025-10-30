<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraphs(3, true),
            'date' => fake()->dateTimeBetween('-1 month', '+1 month'),
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
        ];
    }
}
