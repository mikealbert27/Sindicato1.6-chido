<div>
    <div class="">
        @include('layouts.sideboot')
    </div>
    <form wire:submit.prevent="editarAnuncio">
        @include('livewire.admin.anuncio-create')
    </form>
</div>
