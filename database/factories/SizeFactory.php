<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Size>
 */
class SizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'EU'=>fake()->numerify('##.#'),
            'UK'=>fake()->numerify('##.#'),
            'US_male'=>fake()->numerify('##.#'),
            'US_female'=>fake()->numerify('##.#'),

        ];
    }
}
