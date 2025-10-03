<form onsubmit="fn()" wire:submit.prevent="submit" class="mx-auto px-10 py-5 min-h-screen bg-gray-100">
    @csrf
    <h1 class="text-3xl mb-4">Create Post</h1>
    <input type="text" placeholder="Title" class="border p-2 w-full mb-2 form-control" wire:model="title" />
    
    <textarea type="text" rows="10" wire:model="content" placeholder="Content" class="border p-2 w-full mb-2 form-control">

    </textarea>

    <button type="submit" class="btn bg-blue-500 hover:bg-blue-700 text-white p-2">Submit</button>
</form>