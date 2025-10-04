<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'First Post',
            'slug' => 'first-post',
            'content' => 'This is the first post',
            'user_id' => 1,
            'category_id' => 1,
            'views' => 123,
            'photo' => 'https://placehold.co/1366x768'
        ]);

        Post::create([
            'title' => 'Second Post',
            'slug' => 'second-post',
            'content' => 'This is the second post',
            'user_id' => 1,
            'category_id' => 1,
            'views' => 123,
            'photo' => 'https://placehold.co/1366x768'
        ]);

        Post::create([
            'title' => 'Third Post',
            'slug' => 'third-post',
            'content' => 'This is the third post',
            'user_id' => 1,
            'category_id' => 1,
            'views' => 123,
            'photo' => 'https://placehold.co/1366x768'
        ]);

        Post::create([
            'title' => 'Fourth Post',
            'slug' => 'fourth-post',
            'content' => 'This is the fourth post',
            'user_id' => 1,
            'category_id' => 1,
            'views' => 123,
            'photo' => 'https://placehold.co/1366x768'
        ]);
    }
}
