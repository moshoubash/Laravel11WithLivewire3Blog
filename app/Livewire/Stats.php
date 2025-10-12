<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Stats extends Component
{
    public $topViewedPosts;

    public $numberOfPosts;
    public $totalViews;
    public $totalLikes;
    public $averageViews;


    public function mount()
    {
        $this->numberOfPosts = auth()->user()->posts()->count();
        $this->totalViews = DB::table('posts')->where('user_id', auth()->user()->id)->sum('views');
        $this->totalLikes = DB::table('posts')->join('likes', 'posts.id', '=', 'likes.post_id')
            ->where('posts.user_id', auth()->user()->id)
            ->count();

        $this->averageViews = $this->numberOfPosts ? round($this->totalViews / $this->numberOfPosts, 2) : 0;

        $this->topViewedPosts = DB::table('posts')->select('title', 'views')
            ->orderByDesc('views')
            ->limit(5)
            ->get();

        $this->topViewedPosts = $this->topViewedPosts->map(function ($post) {
            return [
                'name' => $post->title,
                'y' => $post->views,
            ];
        });
    }

    public function render()
    {
        return view('livewire.stats');
    }
}
