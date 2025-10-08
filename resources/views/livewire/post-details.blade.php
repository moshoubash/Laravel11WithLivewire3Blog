@section('styles')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module">
    </script>
@endsection
<div class="container mx-auto my-0 py-10 min-h-screen">
    {{-- session alerts --}}
    @if (session('message'))
        <div class="alert alert-success mb-0">
            {{ session('message') }}
        </div>
        @elseif (session('error'))
        <div class="alert alert-danger mb-0">
            {{ session('error') }}
        </div>
    @endif
    <div class="flex justify-center items-center gap-2">
        <h1 class="text-center mb-2 max-w-5xl w-fit" style="font-weight: bold; font-size: 3rem;">{{ $post->title }}
        </h1>
        @auth
            <div class="text-center">
                @canany(['update', 'delete'], $post)
                    <div class="relative inline-block text-left">
                        <button type="button"
                            class="inline-flex items-center w-full justify-center gap-x-1.5 rounded-md bg-gray-800 px-3 py-2 text-white"
                            id="options-menu" aria-expanded="true" aria-haspopup="true"
                            onclick="document.getElementById('dropdown-menu').classList.toggle('hidden')">
                            <i class="fa fa-gear"></i>
                            <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="-mr-1 size-5 text-white">
                                <path
                                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" fill-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="dropdown-menu"
                            class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-gray-800 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div class="py-1">
                                <a href="/post/{{ $post->slug }}/edit"
                                    class="block px-4 py-2 text-sm text-gray-300 hover:bg-white/5 hover:text-white">
                                    Edit
                                </a>
                                <button
                                    class="block w-full text-left px-4 py-2 text-sm text-red-500 hover:bg-red-500 hover:text-white"
                                    wire:click="delete('{{ $post->slug }}')"
                                    wire:confirm="Are you sure you want to delete this post?">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @endcanany
            </div>
        @endauth
    </div>

    <p class="text-center mb-6 text-lg text-gray-600"><i class="fa fa-user"></i> {{ $post->user->name }} - <i
            class="fa fa-eye"></i> {{ $post->views }} - <i class="fa fa-calendar"></i> {{ $post->created_at }} - <i
            class="fa fa-tag"></i> {{ $post->category->name }}
        @auth
            -
            @if ($isLiked)
                <button class="py-2 px-3 bg-red-500 hover:bg-red-600 focus:outline-none transition rounded text-white"
                    wire:click="unlike">
                    <i class="fa fa-thumbs-down"></i> {{ $likes ?? 0 }}
                </button>

            @else
                <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 focus:outline-none transition rounded text-white"
                    wire:click="like">
                    <i class="fa fa-thumbs-up"></i> {{ $likes ?? 0 }}
                </button>
            @endif

            <div class="fixed top-0 left-0 h-full w-full flex items-center justify-center bg-gray-900 bg-opacity-50" wire:loading style="display: none;">
                <div class="spinner flex justify-center h-full" style="align-items: center !important;">
                    <svg aria-hidden="true" class="w-8 h-8 text-white animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                </div>
            </div>
        @endauth
    </p>

    <div class="w-full max-w-5xl mx-auto">
        <img src="{{ $post->photo }}" alt="Post Image" class="mx-auto mb-6 object-cover rounded-lg w-full">
    </div>

    <div class="prose lg:prose-xl mx-auto max-w-5xl text-lg">
        {!! nl2br(e($post->content)) !!}
    </div>
</div>