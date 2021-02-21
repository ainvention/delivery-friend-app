<div>
    <div class="flex flex-col mx-2 px-3 mt-0 text-sm">
        <div class="flex items-center">
            <input wire:model="toDate" wire:click="$set('toDateManually', null)" value="flexible" type="radio"
                name="toDate" class="w-4 h-4 m-2 border-2 border-gray-400" />
            <span>I'm flexible</span>
        </div>
        <div class="flex items-center">
            <input wire:model="toDate" wire:click="$set('toDateManually', null)" value="today" type="radio"
                name="toDate" class="w-4 h-4 m-2 border-2 border-gray-400" />
            <span>Today</span>
        </div>
        <div class="flex items-center">
            <input wire:model="toDate" wire:click="$set('toDateManually', null)" value="tomorrow" type="radio"
                name="toDate" class="w-4 h-4 m-2 border-2 border-gray-400" />
            <span>Tomorrow</span>
        </div>
        <div class="flex flex-col items-center">
            <x-jet-label for="toDateManually" value="{{ __(' Or Select Date : ') }}" class="text-sm" />
            <x-jet-input wire:model="toDateManually" wire:click="$set('toDate', null)" type="text" id="fickerDate"
                class="m-2 w-full text-center border-2 border-gray-500" name="toDateManually" placeholder="Click" />
            <x-jet-input-error for="toDateManually" class="mt-2" />
        </div>
    </div>
    <script>
        flatpickr("#fickerDate", {
            defaultDate: 'today',
            minDate: "today",
        });
    </script>
</div>
