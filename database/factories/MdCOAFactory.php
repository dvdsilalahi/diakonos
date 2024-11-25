<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MdCOA>
 */
class MdCOAFactory extends Factory
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
            'number' => $this->faker->randomElement(['1.1', '1.2', '1.3',]),
            'account_name' => $this->faker->randomElement(['Offerings', 'Funds', 'Socials']),
            'account_type' => $this->faker->randomElement(['Incomes',]),
        ];
    }
}
