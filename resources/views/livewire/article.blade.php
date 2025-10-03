<div class="card p-2 mb-4 border rounded-lg shadow-sm">
    <div class="overflow-hidden h-64 rounded-lg">
        <img src="{{ $post->photo }}" alt="Post Image" class="object-cover rounded-lg" />
    </div>

    <div class="card-body">
        <h2 class="text-xl font-bold mb-2"><a href="/post/{{ $post->id }}">{{ $post->title }}</a></h2>
        <p class="text-gray-700 mb-4">
            {{ Str::substr($post->content, 0, 180) }}
            @if(strlen($post->content) > 180)
                ... <a href="/post/{{ $post->id }}" class="text-blue-500 hover:underline">Read more</a>
            @endif
        </p>
        <p class="text-gray-500">{{ $post->created_at }}</p>
    </div>
</div>