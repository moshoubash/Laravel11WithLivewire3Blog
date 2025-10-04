<form wire:submit.prevent="search" method="GET" class="d-flex">
    <input class="form-control me-2 rounded" wire:model="query" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
</form>