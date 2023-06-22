<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class AuthorFactory extends Factory
{
    protected $model = \App\Models\Author::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name,
            'yearOfBirth' => $this->faker->numberBetween(1000, Carbon::now()->year),
            'nationality' => $this->faker->streetName,
        ];
    }
}
