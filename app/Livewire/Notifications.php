<?php

namespace App\Livewire;

use Livewire\Component;

class Notifications extends Component
{
    public $notifications;
    public function mount() {
        $this->notifications = auth()->user()->notifications()->latest()->get();
    }

    public function render()
    {
        return view('livewire.notifications', [
            'notifications' => $this->notifications
        ]);
    }
}
