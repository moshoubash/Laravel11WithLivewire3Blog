<?php

namespace App\Livewire;

use App\Events\MarkAsRead;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use App\Events\DeleteNotifications;
use Illuminate\Support\Facades\Cache;
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
        broadcast(new MarkAsRead());
    }

    public function deleteAll() {
        DB::table('notifications')->where('notifiable_id', auth()->user()->id)->delete();
        broadcast(new DeleteNotifications());
    }
    
    #[On('echo-private:notifications,NewLike')]
    public function newLike() {
        $this->render();
    }

    public function render()
    {
        return view('livewire.pages.notifications', [
            'notifications' => auth()->user()->notifications()->latest()->paginate(10)
        ]);
    }
}