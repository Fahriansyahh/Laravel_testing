<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\list_users>
 */
class list_usersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => fake()->slug(),
            'nama' => fake()->name(),
            'umur' => fake()->numberBetween(17, 40),
            'management_id' => fake()->numberBetween(1, 4),
            'description' => fake()->text(100),
            'about' => fake()->text(100),
            'married' => fake()->boolean(),
            'user_id' => fake()->numberBetween(1, 6),

        ];
    }
}
