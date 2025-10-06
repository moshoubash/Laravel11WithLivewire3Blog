<div class="min-h-screen divide-y divide-gray-100 dark:divide-gray-700 bg-gray-800 text-black/50 dark:text-white/50">
    <div class="flex items-center justify-between px-4 py-3">
        <h1 class="px-4 py-3 text-lg font-semibold text-gray-900 dark:text-white">Notifications</h1>
        <button wire:click="markAllAsRead" class="btn bg-blue-500 hover:bg-blue-700 text-white"><i class="fa fa-eye"></i> Mark all as read</button>
    </div>
    @if(auth()->user()->notifications()->count() == 0)
        <h2 class="px-4 py-3 text-sm font-medium text-center text-gray-900 dark:text-white bg-gray-700">No notifications yet.</h2>
    @else
        @foreach ($notifications as $notification)
            <div class="flex items-center gap-4 px-4 py-3 {{ $notification->read_at == null ? 'bg-gray-700' : '' }}">
                <button wire:click="markAsRead('{{ $notification->id }}')" class="btn bg-blue-500 hover:bg-blue-700 text-white"><i class="fa fa-eye"></i></button>
                <div class="shrink-0">
                    <img class="rounded-full w-11 h-11" src="{{ asset('images/avatar.jpg') }}"
                        alt="Bonnie image">
                    <div
                        class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-red-600 border border-white rounded-full dark:border-gray-800">
                        <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 18">
                            <path
                                d="M17.947 2.053a5.209 5.209 0 0 0-3.793-1.53A6.414 6.414 0 0 0 10 2.311 6.482 6.482 0 0 0 5.824.5a5.2 5.2 0 0 0-3.8 1.521c-1.915 1.916-2.315 5.392.625 8.333l7 7a.5.5 0 0 0 .708 0l7-7a6.6 6.6 0 0 0 2.123-4.508 5.179 5.179 0 0 0-1.533-3.793Z" />
                        </svg>
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