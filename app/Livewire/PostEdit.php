<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostEdit extends Component
{
    public $post;
    
    public $title;
    public $content;

    public $res;

    public function mount($id){
        $post = Post::find($id);

        $this->title = $post->title;
        $this->content = $post->content;
        $this->post = $post;
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        
        $this->post->title = $this->title;
        $this->post->content = $this->content;
        $this->post->save();
        
        return redirect()->route('home')->with('message', 'Post updated successfully.');
    }

    public function render()
    {
        return view('livewire.post-edit', [
            'post' => $this->post
        ]);
    }
}
