<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
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
            'title' => $this->faker->randomElement(['Retreat']),
            'event_category' => $this->faker->randomElement([1]),
            'communities' => $this->faker->randomElement([json_encode(['items' => [1]]),]),
            'start_date' => date("Y-m-d"),
            'end_date' => date("Y-m-d"),
            'facility' => $this->faker->randomElement([1]),
            'duties_officers' => $this->faker->randomElement([json_encode(['wl' => ['Davidy Silalahi']]),json_encode(['singers' => ['Josephine Dame', 'Noah Marchiano']])]),
        ];
    }
}
