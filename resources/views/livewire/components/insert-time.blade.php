<div>
    <div class="flex flex-col mx-2 px-3 mt-0 text-sm">
        <div class="flex items-center">
            <input wire:model="toTime" wire:click="$set('toTimeManually', null)" value="flexible" type="radio"
                name="toTime" class="w-4 h-4 m-2 border-2 border-gray-400" />
            <span>I'm flexible</span>
        </div>
        <div class="flex items-center">
            <input wire:model="toTime" wire:click="$set('toTimeManually', null)" value="noon" type="radio" name="toTime"
                class="w-4 h-4 m-2 border-2 border-gray-400" />
            <span>Noon</span>
        </div>
        <div class="flex items-center">
            <input wire:model="toTime" wire:click="$set('toTimeManually', null)" value="evening" type="radio"
                name="toTime" class="w-4 h-4 m-2 border-2 border-gray-400" />
            <span>Evening</span>
        </div>
        <div class="flex items-center">
            <input wire:model="toTime" wire:click="$set('toTimeManually', null)" value="night" type="radio"
                name="toTime" class="w-4 h-4 m-2 border-2 border-gray-400" />
            <span>Night</span>
        </div>
        <div class="flex flex-col items-center">
            <x-jet-label for="toTimeManually" value="{{ __('Select Time') }}" class="text-lg" />
            <x-jet-input wire:model="toTimeManually" wire:click="$set('toTime', null)" id="fickerTime"
                class="mt-2 w-full text-center border-2 border-gray-500" name="toTimeManually" placeholder="Click" />
            <x-jet-input-error for="toTimeManually" class="mt-2" />
        </div>
    </div>
    <script>
        flatpickr('#fickerTime', {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    });
    </script>
</div>
