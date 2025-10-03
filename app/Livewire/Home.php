<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class Home extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = Post::all()->sortByDesc('created_at');
    }

    public function render()
    {
        return view('home', [
            'posts' => $this->posts,
        ]);
    }
}
