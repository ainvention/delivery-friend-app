<x-jet-dialog-modal wire:model="modalSwitchPhoto" id="photoModal">
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
            <x-jet-input wire:model="photo" id="photo" type="file" class="mt-1 block w-full" />
            <x-jet-input-error for="photo" class="mt-2" />
        </div>
        <div wire:loading class="text-green-600 font-semibold mt-2">
            Now loading, please wait...
        </div>
    </x-slot>
    <x-slot name="footer">
        <div wire:loading.remove>
            <x-jet-secondary-button wire:click="photoDelete" class="hover:bg-black">
                @empty($isSetPhoto)
                {{ __('Cancel') }}
                @else
                {{ __('Delete') }}
                @endempty
            </x-jet-secondary-button>
            <x-jet-danger-button class="bg-blue-600  hover:bg-black ml-2" wire:click="savePhoto">
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
        </div>
    </x-slot>
</x-jet-dialog-modal>
