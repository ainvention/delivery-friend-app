<div>
    <x-jet-secondary-button wire:click="$emit('moveBack')" class=" mx-1">
        {{ __('move back') }}
    </x-jet-secondary-button>
    <x-jet-secondary-button wire:click='$refresh' class="mx-1">
        {{ __('Refresh This page') }}
    </x-jet-secondary-button>
</div>
