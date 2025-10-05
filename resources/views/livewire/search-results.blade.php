<div class="container mx-auto py-10 min-h-screen">
    <h1 class="text-center mb-xl-5" style="font-weight: bold; font-size: 3rem;">Search results</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 px-4 py-6">
        @foreach ($posts as $post)
            <div class="card p-2 mb-4 border rounded-lg shadow-sm">
                <div class="rounded-lg">
                    <img src="{{ $post->photo }}" alt="{{ $post->title }}" class="object-cover rounded-lg" />
                </div>

                <div class="card-body">
                    <h2 class="text-xl font-bold mb-2"><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h2>
                    <p class="text-gray-700 mb-4">
                        {{ Str::substr($post->content, 0, 180) }}
                        @if (strlen($post->content) > 180)
                            ... <a href="/post/{{ $post->slug }}" class="text-blue-500 hover:underline">Read more</a>
                        @endif
                    </p>
                    <p class="text-gray-500"> <i class="fa fa-calendar"></i> {{ $post->created_at }} by <i
                            class="fa fa-user"></i> {{ $post->user_name }}</p>
                    <p class="text-gray-500"><i class="fa fa-eye"></i> {{ $post->views }} views</p>
                    <p class="text-gray-500"><i class="fa fa-tag"></i> {{ $post->category_name }}</p>
                </div>
            </div>
        @endforeach

        @if ($posts->isEmpty())
            <p class="text-center col-span-full">No articles found.</p>
        @endif
    </div>
</div>