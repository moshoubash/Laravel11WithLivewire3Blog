<form wire:submit.prevent="search" method="GET" class="d-flex">
    <input class="form-control px-4 py-2" wire:model="query" type="search" placeholder="Search" aria-label="Search" style="border-radius: 20px 0 0 20px;">
    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4" style="border-radius: 0 20px 20px 0" type="submit"><i class="fa fa-search"></i></button>
</form>