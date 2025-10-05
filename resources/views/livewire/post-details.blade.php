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
                    <i class="fa fa-thumbs-down"></i> Un-Like {{ $likes ?? 0 }}
                </button>
            @else
                <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 focus:outline-none transition rounded text-white"
                    wire:click="like">
                    <i class="fa fa-thumbs-up"></i> Like {{ $likes ?? 0 }}
                </button>
            @endif
        @endauth
    </p>

    <img src="{{ $post->photo }}" alt="Post Image" class="mx-auto mb-6 object-cover rounded-lg max-w-5xl">

    <div class="prose lg:prose-xl mx-auto max-w-5xl text-lg">
        {!! nl2br(e($post->content)) !!}
    </div>
</div>
