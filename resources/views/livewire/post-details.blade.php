<div class="container mx-auto my-0 py-10 min-h-screen">
    <h1 class="text-center mb-2 max-w-5xl mx-auto" style="font-weight: bold; font-size: 3rem;">{{ $post->title }}</h1>
    <h2 class="text-center mb-1 text-xl text-gray-700"></h2>
    @auth
        <div class="text-center mb-4">
           @canany(['update', 'delete'], $post)
                <a href="/post/{{ $post->id }}/edit" class="btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <button class="btn btn-danger btn-sm" wire:click="delete({{ $post->id }})" wire:confirm="Are you sure you want to delete this post?">
                    <i class="fa fa-trash"></i> Delete
                </button>
           @endcanany
        </div>
    @endauth
    
    <p class="text-center mb-6 text-lg text-gray-600"><i class="fa fa-user"></i> {{ $post->user->name }} - <i class="fa fa-eye"></i> {{ $post->views }} - <i class="fa fa-calendar"></i> {{ $post->created_at }} - <i class="fa fa-tag"></i> {{ $post->category->name }} 
        @auth
            -
            @if($isLiked)
                <button class="py-2 px-3 bg-red-500 hover:bg-red-600 focus:outline-none transition rounded text-white" wire:click="unlike">
                    <i class="fa fa-thumbs-down"></i> Un-Like {{ $likes ?? 0 }}
                </button>
            @else
                <button class="py-2 px-3 bg-blue-500 hover:bg-blue-600 focus:outline-none transition rounded text-white" wire:click="like">
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
