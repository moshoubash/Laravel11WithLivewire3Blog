<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Redis;

class PostDetails extends Component
{
    public $post;
    public $likes = 0;
    public $isLiked = false;

    public function delete($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if ($post) {
            if($post->user_id !== auth()->id()) {
                session()->flash('error', 'You are not authorized to delete this post.');
                return redirect()->route('home');
            }
            else if($post->likes()->count() > 0) {
                session()->flash('error', 'Post cannot be deleted because it has likes.');
                return back();
            }
            $post->delete();
            session()->flash('message', 'Post deleted successfully.');
            
            if(Redis::exists('posts')){
                Redis::del('posts');
            }
            
            return redirect()->route('home');
        } else {
            session()->flash('error', 'Post not found.');
            return redirect()->route('home');
        }
    }

    public function mount($slug)
    {
        $this->post = Post::where('slug', $slug)->first();

        if (!$this->post) {
            session()->flash('error', 'Post not found.');
            return redirect()->route('home');
        }

        $this->isLiked = $this->post->likes()->where('user_id', auth()->id())->exists();
        $this->likes = $this->post->likes()->count();

        $this->post->views += 1;
        $this->post->save();
    }

    public function like(){
        Like::create([
            'user_id' => auth()->id(),
            'post_id' => $this->post->id,
            'created_at' => now()
        ]);

        $this->post->save();
        $this->likes = $this->post->likes()->count();
        $this->isLiked = true;
    }

    public function unlike(){
        $this->post->likes()->where('user_id', auth()->id())->delete();
        $this->post->save();
        $this->likes = $this->post->likes()->count();
        $this->isLiked = false;
    }

    public function render()
    {
        return view('livewire.post.post-details', [
            'post' => $this->post,
        ]);
    }
}