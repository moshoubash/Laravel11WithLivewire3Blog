<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SearchResults extends Component
{
    public $posts;

    public function mount($q){
        $posts = DB::table('posts')->
                    join('categories', 'posts.category_id', '=', 'categories.id')->
                    join('users', 'posts.user_id', '=', 'users.id')->
                    where('posts.title', 'like', '%' . $q . '%')->
                    orWhere('categories.name', 'like', '%' . $q . '%')->
                    select('posts.*', 'categories.name as category_name', 'users.name as user_name')->
                    get();

        $this->posts = $posts;
    }
    
    public function render()
    {
        return view('livewire.search-results');
    }
}
