<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class CdFactory extends Factory
{
    protected $model = \App\Models\Cd::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->firstName,
            'auth_id' => function () {
                return \App\Models\Author::inRandomOrder()->first()->id;
            },
            'year' => $this->faker->numberBetween(1000, Carbon::now()->year),
            'genre_id' => function () {
                return \App\Models\Genre::inRandomOrder()->first()->id;
            },
        ];
    }
}
