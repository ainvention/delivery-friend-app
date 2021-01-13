<div>
    <!-- component -->
    <div class="text-center mt-24">
        <div class="flex items-center justify-center">
            <h2 class="text-4xl tracking-tight">
                Where should it be picked up from?
            </h2>
        </div>
    </div>

    <div class="flex justify-center my-2 mx-4 md:mx-0">
        <div class="w-full max-w-xl bg-white rounded-lg shadow-md p-6">{{-- form --}}
            <div class="flex flex-wrap mx-3 mb-6">
                <div class="flex flex-col w-full px-3 mb-6">
                    <p id="status" class=""></p>

                    @error('step3')
                    @include('livewire.custom-components.error-messages.required')
                    @enderror

                    @include('livewire.leaflet-map')

                    <div id="searchInput" class="mb-2">
                        <input wire:model="step3" id="fromAddress"
                            class="appearance-none block w-full bg-gray-100 text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                            type='text' disabled>
                    </div>
                    <div class="flex justify-between w-full md:w-full px-3 my-2">
                        <button wire:click="$emitUp('moveBack')"
                            class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500">Back</button>
                        <button wire:click="$emitUp('moveNext')"
                            class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500{{ $step1 === null ? 'disabled:opacity-50' : '' }}"
                            {{$step1 === null ? "disabled" : ""  }}>Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
