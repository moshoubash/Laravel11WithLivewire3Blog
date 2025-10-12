<form wire:submit.prevent="search" method="GET" class="hidden md:flex">
    <input class="form-control px-4 py-2" wire:model="query" type="search" placeholder="Search" aria-label="Search">
    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4" type="submit"><i class="fa fa-search"></i></button>
</form>