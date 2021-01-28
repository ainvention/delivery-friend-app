<div>
    <!-- component -->
    <div class="text-center mt-24">
        <div class="flex items-center justify-center">
            <h2 class="text-4xl tracking-tight">
                Sender location & comment.
            </h2>
        </div>
    </div>

    <div class="flex justify-center my-2 mx-4 md:mx-0">
        <div class="w-full max-w-xl bg-white rounded-lg shadow-md p-6">{{-- form --}}
            <div class="flex flex-wrap mx-3 mb-6">
                <div class="flex flex-col w-full px-3 mb-6">
                    <p id="status" class=""></p>

                    @error($options['fromAddress'])
                    @include('livewire.custom-components.error-messages.required')
                    @enderror

                    @include('livewire.leaflet-map')

                    <div id="searchInput" class="mb-2">
                        <label for="options.fromAddress">Sender location</label>
                        <input wire:model="options.fromAddress" name="options.fromAddress" id="address"
                            class="appearance-none block w-full bg-gray-100 text-gray-900 font-medium border border-gray-400 rounded-lg mb-4 py-3 px-3 leading-tight focus:outline-none"
                            type='text' placeholder="Search sender address in the map" disabled>
                        <label for="options.fromNotes">Comment for helper.</label>
                        <input wire:model.lazy="options.fromNotes"
                            class="appearance-none block w-full text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                            type='text' placeholder="Type some comment for helper :)">
                        <input wire:model="options.fromLat" id="lat"
                            class="appearance-none block w-full bg-gray-100 text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                            type='hidden'>
                        <input wire:model="options.fromLng" id="lng"
                            class="appearance-none block w-full bg-gray-100 text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                            type='hidden'>
                    </div>
                    <div class="flex flex-col sm:flex-row justify-between w-full md:w-full px-3 my-2">
                        <button wire:click="$emitUp('moveBack')" wire:key=step3back
                            class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500">Back</button>
                        <button wire:click="$emitUp('moveNext')" wire:key=step3next
                            class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500
                            {{ $options['fromAddress'] === '' || strlen($options['fromAddress']) < 4 ? 'disabled:opacity-50' : '' }}"
                            {{$options['fromAddress'] === '' || strlen($options['fromAddress']) < 4  ? 'disabled' : ''  }}>Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
