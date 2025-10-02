<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostForm extends Component
{
    public $title;
    public $content;
    public $created_at;

    public function submit()
    {
        // Validate input
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $this->title, 
            'content' => $this->content
        ]);

        $this->reset(['title', 'content']);
    }


    public function render()
    {
        return view('livewire.post-form');
    }
}
