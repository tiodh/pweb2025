<?php

namespace Database\Factories;

use App\Models\Scholarship;
use App\Models\Student;
use App\Models\ScholarshipRecipient;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScholarshipRecipientFactory extends Factory
{
    /**
     * (Best Practice) Tentukan model yang sesuai dengan factory ini.
     */
    protected $model = ScholarshipRecipient::class;

    /**
     * Tentukan status default model.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'scholarship_id' => Scholarship::factory(),
            'year' => fake()->numberBetween(2020, 2025),
            'status' => fake()->randomElement(['active', 'inactive', 'graduated']),
        ];
    }
}
