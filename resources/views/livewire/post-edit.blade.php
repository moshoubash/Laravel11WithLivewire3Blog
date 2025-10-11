<form wire:submit.prevent="submit" class="mx-auto px-10 py-5 min-h-screen bg-gray-100">
    @csrf
    <h1 class="text-3xl mb-4">Edit Post</h1>

    @error('title')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
    <input type="text" placeholder="Title" class="border p-2 w-full mb-2 form-control" wire:model="title" value="{{ $title }}" />
    
    @error('content')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
    <textarea type="text" rows="10" wire:model="content" placeholder="Content" class="border p-2 w-full mb-2 form-control">
        {{ $content }}
    </textarea>

    @error('category_id')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
    <select wire:model="category_id" class="form-control p-2 w-full mb-2 text-gray-500">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if ($category->id == $category_id) selected @endif>{{ $category->name }}</option>
        @endforeach
    </select>

    <div class="flex gap-2">
        <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white">Update</button>
        <a wire:navigate href="/" class="px-4 py-2 bg-gray-500 hover:bg-gray-700 text-white">Back</a>
    </div>
</form>