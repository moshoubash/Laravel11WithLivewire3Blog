<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CategoryPostsTest extends TestCase
{
    use RefreshDatabase;

    public function test_category_posts_page_can_be_rendered()
    {
        $category = Category::create([
            'name' => 'Technology',
            'slug' => 'technology'
        ]);

        $user = User::factory()->create();

        $post = Post::create([
            'title' => 'Laravel 11 News',
            'slug' => 'laravel-11-news',
            'content' => 'Content here',
            'photo' => 'https://via.placeholder.com/150',
            'created_at' => now(),
            'user_id' => $user->id,
            'category_id' => $category->id,
            'views' => 0
        ]);

        $response = $this->get('/category/' . $category->slug);

        $response->assertStatus(200);
        $response->assertSee('Technology');
    }
}
