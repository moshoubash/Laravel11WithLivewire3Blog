<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\Category;

class Navbar extends Component
{
    public $notifications;
    public $unreadNotifications;
    public $categories;

    public function mount() {
        $this->categories = Category::all();
        if(auth()->check()){
            $this->notifications = auth()->user()->notifications()->latest()->limit(5)->get();
            $this->unreadNotifications = auth()->user()->unreadNotifications()->count();
        }
    }

    #[On('echo-private:notifications,NewLike')]
    #[On('echo-private:notifications,MarkAsRead')]
    #[On('echo-private:notifications,DeleteNotifications')]
    public function newLike() {
        $this->notifications = auth()->user()->notifications()->latest()->limit(5)->get();
        $this->unreadNotifications = auth()->user()->unreadNotifications()->count();
    }

    public function render()
    {
        return view('livewire.components.navbar', [
            'notifications' => $this->notifications,
            'unreadNotifications' => $this->unreadNotifications,
            'categories' => $this->categories
        ]);
    }
}
