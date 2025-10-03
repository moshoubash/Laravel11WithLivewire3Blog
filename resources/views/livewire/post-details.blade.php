<div class="container mx-auto my-0 py-10 min-h-screen">
    <h1 class="text-center mb-2" style="font-weight: bold; font-size: 3rem;">{{ $post->title }}</h1>
    <p class="text-center mb-6 text-lg text-gray-600">{{ $post->created_at }}</p>
    
    <img src="{{ $post->photo }}" alt="Post Image" class="mx-auto mb-6 object-cover rounded-lg max-h-100">

    <div class="prose lg:prose-xl mx-auto">
        {!! nl2br(e($post->content)) !!}
    </div>

    <form method="post" action="{{ route('delete-post', $post->id) }}">
        @csrf
        @method('DELETE')
        <div class="text-center mt-10">
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Delete Post
            </button>
        </div>
    </form>
</div>