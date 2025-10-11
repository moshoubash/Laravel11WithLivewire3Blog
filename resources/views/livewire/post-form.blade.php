<form wire:submit.prevent="submit" class="mx-auto px-10 py-5 min-h-screen bg-gray-100">
    @csrf
    <h1 class="text-3xl mb-4">Create Post</h1>

    @error('title')
        <span class="text-red-500">{{ $message }}</span>
    @enderror

    <input type="text" placeholder="Title" class="border p-2 w-full mb-2 form-control" wire:model="title" />
    
    @error('content')
        <span class="text-red-500">{{ $message }}</span>
    @enderror

    <textarea type="text" rows="10" wire:model="content" placeholder="Content" class="border p-2 w-full mb-2 form-control"></textarea>

    @error('category_id')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
    
    <select wire:model="category_id" class="form-control p-2 w-full mb-2 text-gray-500">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    {{-- <input type="file" wire:model="photo" class="form-control px-3 py-2 w-full mb-2 text-gray-500 bg-white" /> --}}

    <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white">Submit</button>
</form>