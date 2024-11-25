<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Community>
 */
class CommunityFactory extends Factory
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
            'category' => $this->faker->unique()->randomElement(['Cell Group', 'Training', 'Community',]),
            'segment' => $this->faker->unique()->randomElement(['Kids', 'Teens', 'Youth', 'Elderly',]),
            'area' => $this->faker->unique()->city(),
            'leaders' => $this->faker->randomElement([json_encode(['leaders' => ['Davidy Silalahi', 'Moses Ramoti']]),json_encode(['leaders' => ['Josephine Dame', 'Noah Marchiano']])]),
            'address' => $this->faker->address(),
            'description' => $this->faker->sentence(),
            'social_media' => $this->faker->url(),
            'gmap_link' => $this->faker->latitude(-6.225014,-6.1676). ',' . $this->faker->longitude(106.7673,106.900447),
           ];
    }
}
