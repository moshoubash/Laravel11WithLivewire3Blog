<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use function Termwind\render;

class SearchBar extends Component
{
    public $query;

    public function search(){
        if(!$this->query) return;

        return redirect(
            route('search.results', ['q' => $this->query])
        );
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
