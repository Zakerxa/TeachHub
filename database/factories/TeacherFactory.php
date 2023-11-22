<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(25, 60),
            'experience' => $this->faker->word,
            'experience_description' => $this->faker->paragraph,
            'time' => $this->faker->randomElement(['full-time', 'part-time']),
            'online_or_local' => $this->faker->boolean,
            'international_or_government' => $this->faker->boolean,
        ];
    }
}
