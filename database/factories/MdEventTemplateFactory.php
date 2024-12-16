<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MdEventTemplate>
 */
class MdEventTemplateFactory extends Factory
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
            'event_category' => $this->faker->randomElement([1,2]),
            'minister_duties' => $this->faker->randomElement([json_encode(['items' => [1, 2]]),json_encode(['items' => [1, 2]]),]),
            'community_duties' => $this->faker->randomElement([json_encode(['items' => [2, 2]]),json_encode(['items' => [1, 2]]),]),
            'segment_attendances' => $this->faker->randomElement([json_encode(['items' => [1, 2]]),json_encode(['items' => [1, 2]]),]),
            'offering_accounts' => $this->faker->randomElement([json_encode(['items' => [2, 2]]),json_encode(['items' => [1, 2]]),]),
            'public_visibility' => 1,
        ];
    }
}
