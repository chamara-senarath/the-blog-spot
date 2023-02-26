<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence($nbWords = 5, $variableNbWords = true),
            'content' => $this->faker->paragraph($nbWords = 800,$nbSentences = 10, $variableNbSentences = true),
            'tags' => ['laravel','vue','node'],
        ];
    }
}
