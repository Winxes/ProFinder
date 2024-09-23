<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;

class PostFactory extends Factory
{
    
     // Define the model's default state. 
    
    protected $model = Post::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id, // Randomly assign an existing user
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            //'tags' => implode(',', $this->faker->randomElements(['front-end', 'back-end', 'design', 'database', 'networking'], 2)),
        ];
    }
}
