<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MdHobbyActivity>
 */
class MdHobbyActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->unique()->sha1(),
            'title' => strtoupper($this->faker->unique()->randomElement(['Painting', 'Hiking', 'Playing an instrument', 'Cooking',])),
        ];
    }
}
