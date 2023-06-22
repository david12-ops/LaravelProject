<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    protected $model = \App\Models\Room::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no' => $this->faker->unique()->numberBetween(1,100),
            'name' => $this->faker->unique()->word(),
            'phone' => $this->faker->boolean(10) ? null : $this->faker->unique()->numberBetween(500,999)
        ];
    }
}
