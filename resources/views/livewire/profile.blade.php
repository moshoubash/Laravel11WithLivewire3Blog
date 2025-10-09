<div class="container mx-auto my-0 py-12 min-h-screen">
    {{-- User info --}}
    <div class="flex gap-2 flex-col justify-center items-center max-w-lg px-2 mx-auto rounded-lg">
        <img src="{{ asset('images/avatar.jpg') }}" class="w-40 h-40 object-fit rounded-full" alt="">
        <div class="flex flex-col text-center">
            <h1 class="text-center" style="font-weight: bold; font-size: 3rem;">{{ $user->name }}</h1>
            <p class="text-center mb-xl-3">{{ $user->email }}</p>
        </div>
    </div>

    {{-- User posts --}}
    <div>
        @if ($posts->isEmpty())
            <p class="text-center col-span-full">No articles found.</p>
        @else
            <div class="grid grid-cols-1 gap-4 px-4 py-6">
                @foreach ($posts as $post)
                    <div class="card p-2 mb-4 border rounded-lg shadow-sm flex flex-row">
                        <div class="rounded-lg">
                            <img src="{{ $post->photo }}" alt="{{ $post->title }}" class="object-cover rounded-lg" />
                        </div>

                        <div class="card-body">
                            <h2 class="text-xl font-bold mb-2"><a
                                    href="/post/{{ $post->slug }}">{{ $post->title }}</a></h2>
                            <p class="text-gray-700 mb-4">
                                {{ Str::substr($post->content, 0, 180) }}
                                @if (strlen($post->content) > 180)
                                    ... <a href="/post/{{ $post->slug }}" class="text-blue-500 hover:underline">Read
                                        more</a>
                                @endif
                            </p>
                            <p class="text-gray-500"> <i class="fa fa-calendar"></i> {{ $post->created_at }}</p>
                            <p class="text-gray-500"><i class="fa fa-user"></i> {{ $post->user->name }}</p>
                            <p class="text-gray-500"><i class="fa fa-eye"></i> {{ $post->views }} views</p>
                            <p class="text-gray-500"><i class="fa fa-tag"></i> {{ $post->category->name }}</p>
                            <p class="text-gray-500"><i class="fa fa-heart"></i> {{ $post->likes->count() }} likes</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
