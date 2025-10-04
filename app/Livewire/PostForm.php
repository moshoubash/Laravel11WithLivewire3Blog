<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostForm extends Component
{
    public $title;
    public $content;
    public $created_at;
    public $categories;
    public $category_id;

    public $res;

    public function mount() {
        $this->categories = Category::all();
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        
        $res = Http::withHeaders([
            'Authorization' => 'wYgiwyCCAPg4bKzqVbhRjPj4yC1ma1q4xzzrZJu7nMqwsE0jHtjDV5Py',
            'Content-Type' => 'application/json'
        ])->get('https://api.pexels.com/v1/search?query=code&per_page=10');
        
        $json = $res->json();

        $post = Post::create([
            'title' => $this->title, 
            'content' => $this->content,
            'slug' => Str::slug($this->title),
            'created_at' => now(),
            'photo' => $json['photos'][rand(1, 9)]['src']['original'],
            'user_id' => Auth::id(),
            'category_id' => $this->category_id
        ]);

        $category = Category::find($this->category_id);
    
        if($category){
            $post->category()->associate($category);
            $post->save();
        }

        $this->reset(['title', 'content', 'category_id']);

        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.post-form', [
            'categories' => $this->categories
        ]);
    }
}