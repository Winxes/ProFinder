<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'post_id' => Post::inRandomOrder()->first()->id, // Randomly assign an existing post
            'user_id' => User::inRandomOrder()->first()->id, // Randomly assign an existing user
            'content' => $this->faker->paragraph,
        ];
    }
}
