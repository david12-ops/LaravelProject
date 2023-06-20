<?php

namespace Database\Factories;

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
            'name' => $this->faker->firstName,
            'auth_id' => function () {
                return \App\Models\Author::inRandomOrder()->first()->id;
            },
            'year' => $this->faker->year,
            'genre_id' => function () {
                return \App\Models\Genre::inRandomOrder()->first()->id;
            },
        ];
    }
}
