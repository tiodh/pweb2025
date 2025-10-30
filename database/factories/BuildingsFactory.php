<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\buildings>
 */
class BuildingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Gedung ' . fake()->word(),
            'location' => fake()->address(),
            'floors' => fake()->numberBetween(2, 8),
            'building_code' => strtoupper(fake()->unique()->lexify('G??')),
        ];
    }
}
