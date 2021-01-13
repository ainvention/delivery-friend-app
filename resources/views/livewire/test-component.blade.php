<div class="w-full h-full">
    <x-jet-button wire:click="modalOpen">Open Modal</x-jet-button>
    <x-jet-label>this is value</x-jet-label>
    <x-jet-confirmation-modal wire:model="testModalSwitch">
        <x-slot name="title">
            Delete Account
        </x-slot>

        <x-slot name="content">
            Are you sure you want to delete your account? Once your account is deleted, all of its resources and data
            will
            be permanently deleted.
            <div>
                <x-jet-button wire:click="$toggle('testModalSwitch')" class="bg-blue-600">
                    clear this!
                </x-jet-button>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('testModalSwitch')" wire:loading.attr="disabled">
                Nevermind
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="modalClose" wire:loading.attr="disabled">
                Delete Account
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
