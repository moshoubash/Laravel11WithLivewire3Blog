<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PostForm extends Component
{
    public $title;
    public $content;
    public $created_at;

    public $res;

    public function submit()
    {
        dd($this->title, $this->content);
        // Validate input
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        
        $res = Http::withHeaders([
            'Authorization' => 'wYgiwyCCAPg4bKzqVbhRjPj4yC1ma1q4xzzrZJu7nMqwsE0jHtjDV5Py',
            'Content-Type' => 'application/json'
        ])->get('https://api.pexels.com/v1/search?query=code&per_page=10');
        
        $json = $res->json();

        Post::create([
            'title' => $this->title, 
            'content' => $this->content,
            'created_at' => now(),
            'photo' => $json['photos'][rand(1, 9)]['src']['original']
        ]);

        $this->reset(['title', 'content']);

        return redirect()->to('/');
    }


    public function render()
    {
        return view('livewire.post-form');
    }
}
