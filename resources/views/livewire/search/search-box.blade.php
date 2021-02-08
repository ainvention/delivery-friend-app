<div x-cloak>
    <x-jet-dialog-modal wire:model="modalSwitch" id="sizeModal">
        <x-slot name="title">
            <span class="font-semibold text-gray-400 text-2xl">Detail search</span>

        </x-slot>
        <x-slot name="content">
            <x-jet-label class="text-xl text-gray-400">This trip happens...</x-jet-label>
            <div class="flex flex-col sm:flex-row w-full">
                <div class="flex items-center mr-4 mb-4">
                    <input wire:model="often" id="regular" type="radio" name="often" value="regular"
                        class="w-8 h-8 m-4 border-1 border-gray-400" checked />
                    <label for="regular" class="flex items-center cursor-pointer text-xl">
                        Regular</label>
                    <input wire:model="often" id="schedule" type="radio" name="often" value="schedule"
                        class="w-8 h-8 m-4 border-1 border-gray-400" />
                    <label for="schedule" class="flex items-center cursor-pointer text-xl">
                        Schedule</label>
                    <input wire:model="often" id="selection" type="radio" name="often" value="selection"
                        class="w-8 h-8 m-4 border-1 border-gray-400" />
                    <label for="selection" class="flex items-center cursor-pointer text-xl">
                        Selection</label>
                    <input wire:model="often" id="specific" type="radio" name="often" value="specific"
                        class="w-8 h-8 m-4 border-1 border-gray-400" />
                    <label for="specific" class="flex items-center cursor-pointer text-xl">
                        Specifix</label>
                </div>
            </div>

            <x-jet-label class="text-xl text-gray-400">And you're going there by...</x-jet-label>
            <div class="flex flex-col sm:flex-row w-full">
                <div class="flex items-center mr-4 mb-4">
                    <input wire.model="size" id="pocket" type="radio" name="size" value="pocket"
                        class="w-8 h-8 m-4 border-1 border-gray-400" checked />
                    <label for="pocket" class="flex items-center cursor-pointer text-xl">
                        Walking</label>
                    <input wire.model="size" id="bag" type="radio" name="size" value="bag"
                        class="w-8 h-8 m-4 border-1 border-gray-400" />
                    <label for="bag" class="flex items-center cursor-pointer text-xl">
                        Bike</label>
                    <input wire.model="size" id="car" type="radio" name="size" value="car"
                        class="w-8 h-8 m-4 border-1 border-gray-400" />
                    <label for="car" class="flex items-center cursor-pointer text-xl">
                        Car</label>
                    <input wire.model="size" id="suv" type="radio" name="size" value="suv"
                        class="w-8 h-8 m-4 border-1 border-gray-400" />
                    <label for="suv" class="flex items-center cursor-pointer text-xl">
                        SUV</label>
                    <input wire.model="size" id="van" type="radio" name="size" value="van"
                        class="w-8 h-8 m-4 border-1 border-gray-400" />
                    <label for="van" class="flex items-center cursor-pointer text-xl">
                        Van</label>
                </div>
            </div>


            {{-- <div class="flex flex-col w-full">
            <input type="range id=" distance" name="distance" step="10" min="0" max="50" class="flex w-full h-10" />
            <x-jet-label class="text-xl text-gray-400">Select how far to search from route</x-jet-label>
        </div> --}}
            <x-jet-label for="distance" class="text-xl text-gray-400">And you're going there by {{ $distance }}km
            </x-jet-label>
            <div class="w-full">
                <input wire:model="distance" type="range" id="" name="distance" min="1" max="50" value="{{ $distance }}"
                    class="w-full" />
                <div class="flex justify-between mt-2 text-xs text-gray-600">
                    <span class="w-8 text-left">0km</span>
                    <span class="w-8 text-center">10km</span>
                    <span class="w-8 text-center">20km</span>
                    <span class="w-8 text-center">30km</span>
                    <span class="w-8 text-center">40km</span>
                    <span class="w-8 text-right">50km</span>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="modalToggle('cancel')">
                {{  __('Cancel') }}
                @csrf
            </x-jet-danger-button>
            <x-jet-secondary-button wire:click="modalToggle('save')">
                @csrf
                {{  __('Save') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
