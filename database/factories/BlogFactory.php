<?php

namespace Database\Factories;

use App\Models\User;
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
            'content' => $this->faker->paragraph($nbWords = 800, $nbSentences = 10, $variableNbSentences = true),
            'tags' => $this->faker->randomElements(['laravel', 'vue', 'node','react','php','mysql'], 3),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }

    // Relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
