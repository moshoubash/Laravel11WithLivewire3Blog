@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />   
@endsection

<form wire:submit.prevent="submit" class="mx-auto px-10 py-5 min-h-screen bg-gray-100">
    @csrf
    <h1 class="text-3xl mb-4">Create Post</h1>

    @error('title')
        <span class="text-red-500">{{ $message }}</span>
    @enderror

    <input type="text" placeholder="Title" class="border-1 border-gray-400 p-2 w-full mb-4" wire:model="title" />
    
    @error('content')
        <span class="text-red-500">{{ $message }}</span>
    @enderror

    <input type="hidden" id="content" name="content" wire:model="content" />

    <div wire:ignore class="bg-white min-h-[200px]" id="editor"></div>

    @error('category_id')
        <span class="text-red-500">{{ $message }}</span>
    @enderror

    <select wire:model="category_id" class="p-2 w-full mb-2 border-1 border-gray-400 text-gray-500 mt-4">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    {{-- <input type="file" wire:model="photo" class="px-3 py-2 w-full mb-2 text-gray-500 bg-white" /> --}}

    <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white">Submit</button>
</form>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });

        const contentInput = document.getElementById('content');
        quill.on('text-change', function() {
            contentInput.value = quill.root.innerHTML;
            contentInput.dispatchEvent(new Event('input'));
        });
    </script>
@endsection