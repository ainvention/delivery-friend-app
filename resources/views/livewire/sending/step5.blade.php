<div class="flex flex-col justify-center my-20 mx-4 xl:mx-40 px-2 xl:px-20   bg-white rounded-lg shadow-md pt-0 p-6">
    <div
        class="text-center flex mb-5 text-4xl justify-center px-4 py-1 dark:text-white rounded-full leading-relaxed font-semibold tracking-wide text-gray-500">
        When could you get the delivery?
    </div>
    <div class="flex flex-col mx-2 px-3 my-10 mt-0 text-lg">
        <div class="flex items-center">
            <input wire:model="toDate" wire:click="$set('toDateCustom', null)" value="flexible" type="radio"
                name="toDate" class="w-8 h-8 m-4 border-2 border-gray-400" />
            <span>I'm flexible</span>
        </div>
        <div class="flex items-center">
            <input wire:model="toDate" wire:click="$set('toDateCustom', null)" value="today" type="radio" name="toDate"
                class="w-8 h-8 m-4 border-2 border-gray-400" />
            <span>Today</span>
        </div>
        <div class="flex items-center">
            <input wire:model="toDate" wire:click="$set('toDateCustom', null)" value="tomorrow" type="radio"
                name="toDate" class="w-8 h-8 m-4 border-2 border-gray-400" />
            <span>Tomorrow</span>
        </div>
        <div class="flex flex-col items-center">
            <x-jet-label for="toDatecustom" value="{{ __('Custom Date : ') }}" class="text-lg" />
            <x-jet-input wire:model="toDateCustom" wire:click="$set('toDate', null)" type="text" id="fickerDate"
                class="m-2 w-full text-center" name="toDateCustom" />
            <x-jet-input-error for="toDateCustom" class="mt-2" />
        </div>
    </div>
    <div
        class="text-center flex mb-5 text-4xl justify-center px-4 dark:text-white rounded-full leading-relaxed font-semibold tracking-wide text-gray-500">
        And what time?
    </div>
    <div class="flex flex-col mx-2 px-3 my-10 mt-0 text-lg">
        <div class="flex items-center"><input wire:model="toTime" wire:click="$set('toTimeCustom', null)"
                value="flexible" type="radio" name="toTime" class="w-8 h-8 m-4 border-2 border-gray-400" /><span>I'm
                flexible</span></div>
        <div class="flex items-center"><input wire:model="toTime" wire:click="$set('toTimeCustom', null)" value="noon"
                type="radio" name="toTime" class="w-8 h-8 m-4 border-2 border-gray-400" />
            <span>Noon</span>
        </div>
        <div class="flex items-center"><input wire:model="toTime" wire:click="$set('toTimeCustom', null)"
                value="evening" type="radio" name="toTime" class="w-8 h-8 m-4 border-2 border-gray-400" />
            <span>Evening</span>
        </div>
        <div class="flex items-center"><input wire:model="toTime" wire:click="$set('toTimeCustom', null)" value="night"
                type="radio" name="toTime" class="w-8 h-8 m-4 border-2 border-gray-400" />
            <span>Night</span>
        </div>
        <div class="flex flex-col items-center">
            <x-jet-label for="toTimecustom" value="{{ __('Custom Time') }}" class="text-lg" />
            <x-jet-input wire:model="toTimeCustom" wire:click="$set('toTime', null)" type="text" id="fickerTime"
                class="mt-2 w-full text-center" name="toTimeCustom" />
            <x-jet-input-error for="toTimeCustom" class="mt-2" />
        </div>
    </div>
    <div class="flex flex-col sm:flex-row sm:space-x-4 px-3 mx-2 mb-6 justify-between">
        <button wire:click="moveBack"
            class="appearance-none py-2 px-4 bg-red-600 hover:bg-red-800 focus:ring-purple-500 focus:ring-offset-purple-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg mb-4 sm:mb-0">Back</button>
        <button wire:click="moveStep6" class="appearance-none py-2 px-4 bg-blue-600 hover:bg-blue-800 focus:ring-purple-500 focus:ring-offset-purple-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg
            {{ isset($toDate) || isset($toDateCustom) ? '' : ' disabled:opacity-50' }}
            {{ isset($toTime) || isset($toTimeCustom) ? '' : ' disabled:opacity-50' }}"
            {{ isset($toDate) || isset($toDateCustom) ? "" : "disabled" }}
            {{ isset($toTime) || isset($toTimeCustom) ? "" : "disabled" }}>Next</button>
    </div>
</div>
<script>
    flatpickr("#fickerDate", {
        defaultDate: 'today',
        minDate: "today",
    });
    flatpickr('#fickerTime', {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    });
</script>
