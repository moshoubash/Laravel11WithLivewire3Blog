<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Redis;

class Home extends Component
{
    public $posts;

    public function mount()
    {
        Redis::get('posts') ? $this->posts = collect(json_decode(Redis::get('posts'))) : null;
        
        if (!$this->posts) {
            $this->posts = Post::all()->sortByDesc('created_at');
            Redis::set('posts', $this->posts->toJson());
            Redis::expire('posts', 900);
        }
    }

    public function render()
    {
        return view('home', [
            'posts' => $this->posts,
        ]);
    }
}
