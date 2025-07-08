<?php

namespace Database\Factories;

use App\Models\EconomicGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EconomicGroup>
 */
class EconomicGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company,
        ];
    }
}
