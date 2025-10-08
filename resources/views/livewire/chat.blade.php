{{-- <div class="p-4 min-h-screen bg-gray-800"> --}}
<div class="p-4 min-h-screen bg-gray-800"
    style="
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5)), url({{ asset('images/background2.jpg') }});
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
">
    @if($messages !== null)
        <div class="my-3 bg-dark text-white py-2 px-4 rounded-xl mx-auto" style="max-width: 1000px;">
            @foreach ($messages as $message)
                @if ($message['role'] === 'user')
                    <p class="text-left my-3 bg-gray-400 text-gray-800 p-4 rounded-xl">{{ $message['content'] }}</p>
                @else
                    <div class="mb-1 px-2 pb-2 text-white rounded-xl">{!! Str::markdown((string) $message['content']) !!}</div>
                @endif
            @endforeach
        </div>
    @endif

    <div class="h-full flex items-center flex-col justify-center min-h-[80vh]" wire:show="!messages">
        <img src="{{ asset('images/open-ai.png') }}" width="200" class="mx-auto opacity-50" alt="Open ai">
    </div>

    <div class="fixed bottom-4 w-full mx-auto flex justify-center">
        <form wire:submit.prevent="send" class="flex items-center justify-center">
            <input type="text" class="min-w-[700px] px-4 py-3 border-2 border-gray-400 h-full"
                placeholder="Write a message" wire:model="message" />
            <button
                class="min-w-[100px] h-full flex items-center justify-center bg-gray-200 border-2 border-gray-400"><i
                    class="fa fa-send"></i></button>
        </form>
    </div>

    <div class="fixed top-0 left-0 h-full w-full flex items-center justify-center bg-gray-900 bg-opacity-90"
       wire:loading>
        <div class="spinner flex justify-center h-full" style="align-items: center !important;">
            <img src="{{ asset('images/open-ai-logo.png') }}" width="50" class="mx-auto opacity-70 animate-spin"
                alt="Open ai">
        </div>
    </div>
</div>
