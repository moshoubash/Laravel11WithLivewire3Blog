<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostDetails extends Component
{
    public $post;

    public function delete($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            session()->flash('message', 'Post deleted successfully.');
            return redirect()->route('home');
        } else {
            session()->flash('error', 'Post not found.');
            return redirect()->route('home');
        }
    }

    public function mount($id)
    {
        $this->post = Post::find($id);
    }

    public function render()
    {
        return view('livewire.post-details', [
            'post' => $this->post,
        ]);
    }
}
