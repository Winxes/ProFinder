<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Seed the posts table.
     *
     * 
     */
    public function run()
    {
        // Create 20 posts using the PostFactory
        Post::factory()->count(20)->create();
    }
}
