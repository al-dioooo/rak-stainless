<div class="d-inline" x-data="{ confirmDelete:false }">
    <button x-show="!confirmDelete" x-on:click="confirmDelete=true" class="btn btn-danger btn-xs">Delete</button>
    {{ $id }}
    <button x-show="confirmDelete" wire:click="delete({{ $id }})" x-on:click="confirmDelete=false"
        class="btn btn-success btn-xs">Yes</button>

    <button x-show="confirmDelete" x-on:click="confirmDelete=false" class="btn btn-danger btn-xs">No</button>
</div>
