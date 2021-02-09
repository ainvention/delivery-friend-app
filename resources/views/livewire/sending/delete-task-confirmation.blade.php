<div>
    <x-jet-confirmation-modal wire:model="modalSwitch">
        <x-slot name="title">
            {{ __('Delete Task') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this task?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="modalToggle" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteTask" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
