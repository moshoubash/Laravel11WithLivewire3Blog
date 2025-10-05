<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class PostEdit extends Component
{
    public $post;
    public $categories;
    
    public $title;
    public $content;
    public $category_id;

    public $res;

    public function mount($slug){
        $this->post = Post::where('slug', $slug)->first();
        $this->categories = Category::all();

        $this->title = $this->post->title;
        $this->content = $this->post->content;
        $this->category_id = $this->post->category_id;
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);
        
        $this->post->title = $this->title;
        $this->post->slug = Str::slug($this->title);
        $this->post->content = $this->content;
        $this->post->category_id = $this->category_id;
        $this->post->save();
        
        return redirect()->route('home')->with('message', 'Post updated successfully.');
    }

    public function render()
    {
        return view('livewire.post-edit', 
            [
                'categories' => Category::all(),
                'post' => $this->post
            ]);
    }
}
