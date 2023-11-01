<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MealTranslation>
 */
class MealTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'locale' => $this->faker->randomElement(['en', 'hr']),
            'title' => $this->faker->word,
            'description' => $this->faker->sentence,
        ];
    }
}
