<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

    class PostForm extends Component
{
    // use WithFileUploads;

    #[Validate('required|string|max:255')]
    public $title;
    public $content;
    
    public $created_at;
    public $categories;

    #[Validate('required|exists:categories,id')]
    public $category_id;
    
    // #[Validate('image|mimes:jpg,png,jpeg,gif,svg|max:1024')]
    // public $photo;

    public $res;

    public function mount() {
        $this->categories = Category::all();
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id'
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
            'photo' => $json['photos'][0]['src']['original'],
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