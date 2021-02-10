<x-jet-dialog-modal wire:ignore wire:model="modalSwitchPhoto" id="photoModal" class="photo-modal">
    <x-slot name="title">
        @empty($isSetPhoto)
        Add Photo
        @else
        Change Photo
        @endempty
    </x-slot>
    <x-slot name="content">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="photo" value="{{ __('Choose a your item photo') }}" />
            <x-jet-input wire:model="photo" id="photo" value="" type="file" class="mt-1 block w-full" />
            <x-jet-input-error for="photo" class="mt-2" />
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="photoDelete">
            @empty($isSetPhoto)
            {{ __('Cancel') }}
            @else
            {{ __('Delete') }}
            @endempty
        </x-jet-secondary-button>
        <x-jet-danger-button class="ml-2" wire:click="savePhoto" wire:loading.attr="disabled">
            @empty($isSetPhoto)
            {{ __('Save') }}
            @else
            {{ __('Change') }}
            @endempty
        </x-jet-danger-button>
        <div>
            {{-- invalid coupon message --}}
            @if (session()->has('error'))
            <div class="text-red-500">
                {{ session('error') }}
            </div>
            @elseif (session()->has('message'))
            <div class="text-blue-500">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </x-slot>
</x-jet-dialog-modal>
