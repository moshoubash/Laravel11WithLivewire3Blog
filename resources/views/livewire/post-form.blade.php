<form method="post">
    @csrf
    <input type="text" wire:model="title" placeholder="Title" class="border p-2 w-full mb-2">
    <textarea name="body" placeholder="Body" class="border p-2 w-full mb-2"></textarea>
    <button type="submit" class="bg-blue-500 text-white p-2">Submit</button>
</form>