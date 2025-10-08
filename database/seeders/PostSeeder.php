<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'title' => 'First Post',
            'slug' => 'first-post',
            'content' => implode(' ', fake()->paragraphs(5)),
            'user_id' => 1,
            'category_id' => 1,
            'views' => 213,
            'photo' => 'https://placehold.co/1366x768'
        ]);

        Post::create([
            'title' => 'Second Post',
            'slug' => 'second-post',
            'content' => implode(' ', fake()->paragraphs(5)),
            'user_id' => 1,
            'category_id' => 1,
            'views' => 141,
            'photo' => 'https://placehold.co/1366x768'
        ]);

        Post::create([
            'title' => 'Third Post',
            'slug' => 'third-post',
            'content' => implode(' ', fake()->paragraphs(5)),
            'user_id' => 1,
            'category_id' => 1,
            'views' => 103,
            'photo' => 'https://placehold.co/1366x768'
        ]);

        Post::create([
            'title' => 'Fourth Post',
            'slug' => 'fourth-post',
            'content' => implode(' ', fake()->paragraphs(5)),
            'user_id' => 1,
            'category_id' => 1,
            'views' => 412,
            'photo' => 'https://placehold.co/1366x768'
        ]);
    }
}
