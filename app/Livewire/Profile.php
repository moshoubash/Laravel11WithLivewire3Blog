<?php

namespace App\Livewire;

use Livewire\Component;

class Profile extends Component
{
    public $user;
    public $posts;

    public function mount()
    {
        $this->user = auth()->user();
        $this->posts = $this->user->posts()->get();
    }
    
    public function render()
    {
        return view('livewire.profile');
    }
}
