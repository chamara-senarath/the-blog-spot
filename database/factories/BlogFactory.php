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
        $content = '';
        for ($i=0; $i < rand(6, 12); $i++) {
            $paragraph = $this->faker->paragraph($nbWords = rand(20, 50), $nbSentences = rand(6, 12), $variableNbSentences = true);
            $content = $content . "<p>$paragraph</p></br>";
        }
        return [
            'title' => $this->faker->sentence($nbWords = 5, $variableNbWords = true),
            'content' => $content,
            'tags' => $this->faker->randomElements(['laravel', 'vue', 'node', 'react', 'php', 'mysql'], 3),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }

    // Relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
