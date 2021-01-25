<div>
    @if($step === 1)
    <div class="">
        <!-- component -->
        <div class="text-center mt-24">
            <div class="flex items-center justify-center">
            </div>
            <h2 class="text-4xl tracking-tight">
                What do you want to send ?
            </h2>
            <span class="text-sm">or <a href="#" class="text-blue-500">
                    to help deliver
                </a>
            </span>
        </div>

        <div class="flex justify-center my-2 mx-4 md:mx-0">
            <div class="w-full max-w-xl bg-white rounded-lg shadow-md p-6">{{-- form --}}
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div wire:click="modalToggle"
                        class="text-center w-full h-full py-20 md:w-full px-3 mb-6 bg-gradient-to-r from-yellow-400 via-red-500 to-pink-500">
                        <svg class="block m-auto h-16" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Upload Photo
                        <br>
                        (Optional)

                    </div>
                    <img class="w-full height-full" src="{{ asset('storage/'.$options['photo'])}}" alt="">
                    <div class="w-full md:w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for='title'>Title</label>
                        <input wire:model.debounce.500ms=options.title
                            class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                            type='text' placeholder="Title(e.g. Office chair)">
                        <x-jet-input-error for="options.title" class="mt-2" />
                    </div>
                    <div class="w-full md:w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for='notes'>Additional notes</label>
                        <input wire:model.debounce.lazy="options.notes"
                            class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                            type='text' placeholder="Additional notes for delivery(Oprional)">
                    </div>
                    <div class="w-full md:w-full px-3 mb-6">
                        <button wire:click="$emitUp('moveNext')"
                            class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500 {{ $options['title'] === null || strlen($options['title']) < 4 ? 'disabled:opacity-50' : '' }}"
                            {{ $options['title'] === null || strlen($options['title']) < 4 ? "disabled" : ""  }}>Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <x-jet-dialog-modal wire:model="modalSwitch">
        <x-slot name="title">
            Add Photo
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="name" value="{{ __('Choose a your item photo') }}" />
                <x-jet-input wire:model="options.photo" id="name" type="file" value="" class="mt-1 block w-full" />
                <x-jet-input-error for="options.photo" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="resetOption('photo')">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="imageSave" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    @elseif($step === 2)
    @include('livewire.sending.step2',['step' => $step])
    @elseif($step === 3)
    @include('livewire.sending.step3',['step' => $step])
    @elseif($step === 4)
    @include('livewire.sending.step4',['step' => $step])
    @elseif($step === 5)
    @include('livewire.sending.step5',['step' => $step])
    @elseif($step === 6)
    @include('livewire.sending.step6',['step' => $step])
    @endif
</div>
