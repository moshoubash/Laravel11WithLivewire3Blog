<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class Notifications extends Component
{
    use WithPagination;

    public function markAsRead($notification_id) {
        $notification = auth()->user()->notifications()->find($notification_id);
        $notification->markAsRead();
    }

    public function markAllAsRead() {
        auth()->user()->unreadNotifications->markAsRead();
    }

    public function deleteAll() {
        DB::table('notifications')->where('notifiable_id', auth()->user()->id)->delete();
    }
    
    #[On('echo-private:notifications,NewLike')]
    public function newLike() {
        $this->render();
    }

    public function render()
    {
        return view('livewire.notifications', [
            'notifications' => auth()->user()->notifications()->latest()->paginate(10)
        ]);
    }
}
