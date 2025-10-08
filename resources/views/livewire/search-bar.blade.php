<form wire:submit.prevent="search" method="GET" class="d-flex">
    <input class="form-control px-4 py-2" wire:model="query" type="search" placeholder="Search" aria-label="Search">
    <button class="bg-gray-600 hover:bg-gray-700 text-white px-4" type="submit"><i class="fa fa-search"></i></button>
</form>