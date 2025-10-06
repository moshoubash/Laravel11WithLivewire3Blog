<div class="min-h-screen divide-y divide-gray-100 dark:divide-gray-700 bg-gray-800 text-black/50 dark:text-white/50">
    <div class="flex items-center justify-between px-4 py-3">
        <h1 class="px-4 py-3 text-lg font-semibold text-gray-900 dark:text-white">Notifications</h1>
        <div>
            <button wire:click="markAllAsRead" class="btn bg-blue-500 hover:bg-blue-700 text-white"><i class="fa fa-eye"></i> Mark all as read</button>
            <button wire:click="deleteAll" wire:confirm="Are you sure you want to delete all notifications?" class="btn bg-red-500 hover:bg-red-700 text-white"><i class="fa fa-trash"></i> Delete All</button>
        </div>
    </div>
    @if(auth()->user()->notifications()->count() == 0)
        <h2 class="px-4 py-3 text-sm font-medium text-center text-gray-900 dark:text-white bg-gray-700">No notifications yet.</h2>
    @else
        @foreach ($notifications as $notification)
            <div class="flex items-center gap-4 px-4 py-3 {{ $notification->read_at == null ? 'bg-gray-700' : '' }}">
                <button wire:click="markAsRead('{{ $notification->id }}')" class="btn bg-blue-500 hover:bg-blue-700 text-white"><i class="fa fa-eye"></i></button>
                <div class="shrink-0">
                    <img class="rounded-full w-11 h-11 border-2 border-white" src="{{ asset('images/avatar.jpg') }}"
                        alt="Bonnie image">
                    <div
                        class="text-white absolute flex items-center justify-center w-7 h-7 ms-6 -mt-5 bg-blue-600 border border-white rounded-full dark:border-gray-800">
                        <i class="fa fa-bell"></i>
                    </div>
                </div>
                <div class="w-full ps-3">
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span
                            class="font-semibold text-gray-900 dark:text-white">{{ $notification->data['message'] }}</div>
                    <div class="font-semibold text-xs text-blue-600 dark:text-blue-500">{{ $notification->created_at->diffForHumans() }}</div>
                </div>
            </div>
        @endforeach
        <div class="flex justify-center px-4 py-3">
            {{ $notifications->links(
                'pagination::tailwind',
            )}}
        </div>
    @endif
</div>