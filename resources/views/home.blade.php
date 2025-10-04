<div>
    @if (session('message'))
        <div class="alert alert-success mb-0">
            {{ session('message') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger mb-0">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success mb-0">
            {{ session('success') }}
        </div>
    @endif


    <div class="text-center bg-gray-800 text-white mb-10">
        <div class="max-w-full px-6 py-20 text-center">
            <h1 class="text-5xl font-bold">Start writing <span class="bg-white text-gray-800 px-2 rounded">NOW</span></h1>
            <p class="py-6">This is the home page of our application. Explore the features and enjoy your stay!</p>
            <a href="/post/create" class="btn btn-primary">Write Now</a>
        </div>
    </div>

    <div class="container mx-auto my-0">
        <h1 class="text-center mb-xl-5" style="font-weight: bold; font-size: 3rem;">Articles</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 px-4 py-6">
            @foreach ($posts as $post)
                <livewire:article key="{{ $post->id }}" :id="$post->id" />
            @endforeach

            @if($posts->isEmpty())
                <p class="text-center col-span-full">No articles found.</p> 
            @endif
        </div>
    </div>
</div>