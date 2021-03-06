<div
    class="flex flex-col justify-center my-10 mx-4 xl:mx-4 px-2 bg-white rounded-lg  text-gray-500  sm:tracking-widest ">
    @include('livewire.components.sessionMessage')
    <div
        class="text-center flex text-4xl justify-center px-4 py-1 dark:text-white rounded-full leading-relaxed font-semibold tracking-wide text-gray-500">
        Receiver location & comment.
    </div>

    <div class="mb-10 text-center text-gray-400 h-full">
        <p id="status" class="my-10 text-red-600"></p>
        @include('livewire.components.maps.leaflet-map-receiver')

        "Click" to get the <span class="text-green-600 font-bold">receiver</span> location, "Scroll" to zoom in
        &
        out.
    </div>

    @error($fromAddress)
    @include('livewire.components.error-messages.required')
    @enderror

    <div id="searchInput" class="mb-2 text-green-600 text-lg">
        <label for="toAddress">Receiver location</label>
        <input wire:model="toAddress" id="address"
            class="appearance-none block w-full bg-gray-100 text-gray-900 font-medium border border-gray-400 rounded-lg mb-4 py-3 px-3 leading-tight focus:outline-none"
            type='text' placeholder="Search receiver address in the map" disabled>
        <label for="toNotes">Comment for helper(optional)</label>
        <input wire:model.lazy="toNote"
            class="appearance-none block w-full text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
            type='text' placeholder="Type some comment for helper :)">
        <input wire:model="simpleToAddress" id="simpleToAddress" type='hidden'>
        <input wire:model="toLat" id="lat" type='hidden'>
        <input wire:model="toLng" id="lng" type='hidden'>
    </div>
    <div class="flex flex-col sm:flex-row sm:space-x-4 justify-between w-full md:w-full">
        <div class="flex flex-col sm:flex-row sm:space-x-4 justify-between w-full md:w-full my-6">
            <button wire:click="moveBack" wire:key=step4back
                class="py-2 px-4  bg-red-600 hover:bg-black text-white w-full text-center text-base font-semibold shadow-md rounded-lg">Back</button>
            <button wire:click="moveStep5" wire:key=step4next
                class="py-2 px-4  bg-blue-600 hover:bg-black text-white w-full text-center text-base font-semibold shadow-md rounded-lg {{ $toAddress === null || strlen($toAddress) < 4 ? 'disabled:opacity-50' : '' }}"
                {{ $toAddress === null || strlen($toAddress) < 4 ? 'disabled' : ''  }}>Next</button>
        </div>
    </div>
</div>
