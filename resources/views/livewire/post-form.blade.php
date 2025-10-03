<form wire:submit.prevent="submit">
    @csrf
    <input type="text" placeholder="Title" class="border p-2 w-full mb-2" wire:model="title" />
    <textarea placeholder="Body" class="border p-2 w-full mb-2" wire:model="content"></textarea>
    <button type="submit" class="bg-blue-500 text-white p-2">Submit</button>
</form>