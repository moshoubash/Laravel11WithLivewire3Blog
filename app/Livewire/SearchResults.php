<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class SearchResults extends Component
{
    public $posts;

    public function mount($q){
        $posts = DB::table('posts')->
                    join('categories', 'posts.category_id', '=', 'categories.id')->
                    join('users', 'posts.user_id', '=', 'users.id')->
                    where('posts.title', 'like', '%' . $q . '%')->
                    orWhere('categories.name', 'like', '%' . $q . '%')->
                    orWhere('users.name', 'like', '%' . $q . '%')->
                    select('posts.*', 'categories.name as category_name', 'users.name as user_name')->
                    get();

        Redis::get('search_results_' . $q) ? $this->posts = collect(json_decode(Redis::get('search_results_' . $q))) : $this->posts = [];
        
        if(empty($this->posts)){
            Redis::set('search_results_' . $q, json_encode($posts));
            Redis::expire('search_results_' . $q, 300);
            $this->posts = $posts;
        }
    }
    
    public function render()
    {
        return view('livewire.pages.search-results');
    }
}
