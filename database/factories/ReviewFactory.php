<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $string  = 'QWERTYUIOPASDFGHJKLZXCVBNM0123456789';
        $shuffle = str_shuffle($string);

        return [
            'name'     => $this->faker->name(),
            'message'  => $this->faker->paragraph(),
            'token'    => 'Review-' . substr($shuffle, 0, 10) . '-' . rand(1000, 9999),
            'password' => Str::random(8),
            'rating'   => $this->faker->randomElement(['1','2','3','4','5']),
            'status'   => $this->faker->randomElement([0, 1]),
        ];
    }
}
