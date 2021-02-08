<div>
    @if($step === 1)
    <div
        class="flex flex-col justify-center my-20 mx-4 xl:mx-40 px-2 xl:px-20   bg-white rounded-lg shadow-md pt-0 p-6  text-gray-500">
        @include('livewire.components.sessionMessage')
        <div
            class="flex flex-col text-center mb-5 text-4xl item-center justify-center px-4 py-1 dark:text-white rounded-full leading-relaxed font-semibold tracking-wide">
            What do you want to send ?
            </h2>
            <span class="text-lg">or <a href="/search" class="text-blue-500">
                    to help sender
                </a>
            </span>
        </div>
        <div class="flex justify-center my-2 mx-4 md:mx-0">
            <div class="w-full max-w-xl">{{-- form --}}
                <div class="flex flex-col mx-3 space-y-6">
                    @empty($isSetPhoto)
                    <div wire:click="modalToggle"
                        class="text-center w-full py-20 md:w-full px-3 mb-6 bg-gradient-to-r from-yellow-400 via-red-500 to-pink-500">
                        <svg class="block m-auto h-16" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Chick to add a photo.</span>
                        <br>
                        <span>(Optional)</span>
                    </div>
                    @else
                    <div wire:click="modalToggle" class="flex flex-col text-center">
                        <img src="{{ asset('storage/'.$photo)}}" class="object-scale-down max-h-72 w-full sm:p-6">
                        <span class="w-full italic">Click photo to change.</span>
                    </div>
                    @endempty
                    <div class="w-full md:w-full">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for='title'>Title</label>
                        <input wire:model.debounce.300ms="title" name="sending item title"
                            class="appearance-none block w-full bg-white font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                            type='text' placeholder="Title(e.g. Office chair)">
                        <x-jet-input-error for="title" class="mt-2" />
                    </div>
                    <div class="w-full md:w-full">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for='note'>Additional
                            note</label>
                        <input wire:model.debounce.1000ms="note" name="note"
                            class="appearance-none block w-full bg-white font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                            type='text' placeholder="Additional notes for delivery(Oprional)">
                        <x-jet-input-error for="note" class="mt-2" />
                    </div>
                    <div class="flex flex-col sm:flex-row sm:space-x-4 justify-between w-full md:w-full">
                        <button wire:click="moveStep2"
                            class="appearance-none py-2 px-4  bg-blue-600 hover:bg-blue-800 focus:ring-purple-500 focus:ring-offset-purple-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg {{ $title === null || strlen($title) < 4 ? 'disabled:opacity-50' : '' }}"
                            {{ $title === null || strlen($title) < 4 ? "disabled" : ""  }}>Next</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // var photoModal = document.getElementById('photoModal');
            // photoModal.addEventListener('click', function(e) {
            //     if(e.target.className === 'test1'){
            //         alert('inside clicked, className is : ' +e.target.className);
            //     } else {
            //         alert('outside clicked');
            //     }
            // })
        </script>
        {{-- Fix an error which below modal window is executed when reading this page because the $modalSwitch variable value is not assigned. --}}
        @isset($modalSwitch)
        <x-jet-dialog-modal x-cloak wire:model="modalSwitch" id="photoModal" class="photo-modal">
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
        @endisset
    </div>

    @elseif($step === 2)
    @include('livewire.sending.step2',['step' => $step])
    @include('livewire.components.testing.refreshCurrentPage')
    @elseif($step === 3)
    @include('livewire.sending.step3',['step' => $step])
    @include('livewire.components.testing.refreshCurrentPage')
    @elseif($step === 4)
    @include('livewire.sending.step4',['step' => $step])
    @include('livewire.components.testing.refreshCurrentPage')
    @elseif($step === 5)
    @include('livewire.sending.step5',['step' => $step])
    @include('livewire.components.testing.refreshCurrentPage')
    @elseif($step === 6)
    @include('livewire.sending.step6-recommended-price',['step' => $step])
    @include('livewire.components.testing.refreshCurrentPage')
    @elseif($step === 7)
    @include('livewire.sending.step7-request-published', ['step' => $step])
    @include('livewire.components.testing.refreshCurrentPage')
    @elseif($step === 8)
    @include('livewire.sending.step8-edit-task', ['step' => $step])
    @include('livewire.components.testing.refreshCurrentPage')
    @else
    @endif
</div>
