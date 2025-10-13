<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

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

        Redis::get('topViewedPosts') ? $this->topViewedPosts = collect(json_decode(Redis::get('topViewedPosts'))) : null;

        if($this->topViewedPosts === null) {
            $this->topViewedPosts = DB::table('posts')->where('user_id', auth()->user()->id)->select('title', 'views')
                    ->orderByDesc('views')
                    ->limit(5)
                    ->get();

            Redis::set('topViewedPosts', $this->topViewedPosts);
            Redis::expire('topViewedPosts', 100);
        }

        $this->topViewedPosts = $this->topViewedPosts->map(function ($post) {
            return [
                'name' => $post->title,
                'y' => $post->views,
            ];
        });
    }

    public function render()
    {
        return view('livewire.pages.stats');
    }
}
