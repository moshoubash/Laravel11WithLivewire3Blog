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
    
    <div class="text-center bg-gray-800 text-white mb-10">
        <div class="max-w-full px-6 py-16 text-center">
            <h1 class="text-4xl font-bold">Category: <span class="bg-white text-gray-800 px-3 py-1 rounded">{{ $category->name }}</span></h1>
            <p class="py-4 text-gray-300">Browse all articles published under standard category "{{ $category->name }}"</p>
        </div>
    </div>

    <div class="container mx-auto my-0 min-h-screen">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 px-4 py-6">
            @foreach ($posts as $post)
                <livewire:article key="{{ $post->id }}" :id="$post->id" />
            @endforeach

            @if($posts->isEmpty())
                <div class="col-span-full text-center py-12 text-gray-500">
                    <i class="fa fa-folder-open text-4xl mb-3 block"></i>
                    <p class="text-xl">No articles found in this category.</p>
                    <a href="/home" wire:navigate class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Back to Home</a>
                </div>
            @endif
        </div>
    </div>
</div>
