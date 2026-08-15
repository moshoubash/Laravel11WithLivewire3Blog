<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Redis;

class CategoryPosts extends Component
{
    public $category;
    public $posts;

    public function mount($slug)
    {
        $this->category = Category::where('slug', $slug)->first();

        if (!$this->category) {
            session()->flash('error', 'Category not found.');
            return redirect()->route('home');
        }

        $cacheKey = 'category_posts_' . $this->category->id;
        
        if (Redis::exists($cacheKey)) {
            $this->posts = collect(json_decode(Redis::get($cacheKey)));
        } else {
            $this->posts = Post::where('category_id', $this->category->id)
                ->orderBy('created_at', 'desc')
                ->get();

            Redis::set($cacheKey, $this->posts->toJson());
            Redis::expire($cacheKey, 60);
        }
    }

    public function render()
    {
        return view('livewire.pages.category-posts');
    }
}
