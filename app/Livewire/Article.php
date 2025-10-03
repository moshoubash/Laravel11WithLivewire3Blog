<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class Article extends Component
{
    public $post;

    public function mount($id)
    {
        $this->post = Post::find($id);
    }

    public function render()
    {
        return view('livewire.article', [
            'post' => $this->post,
        ]);
    }
}