<div wire:key="searchStep1Pagekey">
    <div class="flex flex-col justify-center my-10 mx-4 px-2 bg-white rounded-lg  text-gray-500  sm:tracking-widest">
        @include('livewire.components.sessionMessage')
        {{-- search box modal start --}}
        <div wire:key="searchBoxModalkey">
            <x-jet-dialog-modal wire:model="modalSwitch" id="sizeModal">
                <x-slot name="title">
                    <span class="font-semibold text-gray-400 text-2xl">Detail search</span>

                </x-slot>
                <x-slot name="content">
                    <label class="text-xl text-gray-400">This trip happens...</label>
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

                    <label class="text-xl text-gray-400">And you're going there by...</label>
                    <div class="flex flex-col sm:flex-row w-full">
                        <div class="flex items-center mr-4 mb-4">
                            <input wire:model="size" id="pocket" type="radio" name="size" value="POCKET"
                                class="w-8 h-8 m-4 border-1 border-gray-400" checked />
                            <label for="pocket" class="flex items-center cursor-pointer text-xl">
                                Walking</label>
                            <input wire:model="size" id="bag" type="radio" name="size" value="BAG"
                                class="w-8 h-8 m-4 border-1 border-gray-400" />
                            <label for="bag" class="flex items-center cursor-pointer text-xl">
                                Bike</label>
                            <input wire:model="size" id="car" type="radio" name="size" value="CAR"
                                class="w-8 h-8 m-4 border-1 border-gray-400" />
                            <label for="car" class="flex items-center cursor-pointer text-xl">
                                Car</label>
                            <input wire:model="size" id="suv" type="radio" name="size" value="SUV"
                                class="w-8 h-8 m-4 border-1 border-gray-400" />
                            <label for="suv" class="flex items-center cursor-pointer text-xl">
                                SUV</label>
                            <input wire:model="size" id="van" type="radio" name="size" value="VAN"
                                class="w-8 h-8 m-4 border-1 border-gray-400" />
                            <label for="van" class="flex items-center cursor-pointer text-xl">
                                Van</label>
                        </div>
                    </div>


                    {{-- <div class="flex flex-col w-full">
                    <input type="range id=" distance" name="distance" step="10" min="0" max="50" class="flex w-full h-10" />
                    <x-jet-label class="text-xl text-gray-400">Select how far to search from route</x-jet-label>
                </div> --}}
                    <x-jet-label for="distance" class="text-xl text-gray-400">And you're going there by
                        {{ $distance }}km
                    </x-jet-label>
                    <div class="w-full">
                        <input wire:model="distance" type="range" name="distance" min="1" max="50"
                            value="{{ $distance }}" class="w-full" />
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

        {{-- main page start --}}
        <div
            class="flex flex-col text-center mb-5 text-4xl item-center justify-center px-4 dark:text-white rounded-full leading-relaxed font-semibold tracking-wide">
            Our user need your help!!
            </h2>
            <span class="text-lg">or <a href="/sending" class="text-blue-500">
                    to send a item
                </a>
            </span>
        </div>
        <div class="flex flex-col sm:flex-row w-full h-9 my-4 justify-between">
            <div class="flex flex-col w-full sm:flex-row justify-between">
                <input wire:model="fromAddress" class="flex w-full border-2 border-gray-300 mr-4" type="text"
                    placeholder=" Send from">
                <input wire:model="toAddress" class="flex w-full  border-2 border-gray-300 mr-4" type="text"
                    placeholder=" Delivery To">
                <input wire:click="modalToggle" class="flex w-full  border-2 border-gray-300 mr-4" type="text"
                    placeholder=" Detail info">
            </div>
            <x-jet-button wire:click="searchTask"
                class="flex w-1/4 border-2 border-gray-200 bg-blue-500 text-white hover:text-gray-600 hover:bg-red-400 justify-center">
                {{ __('Search') }}
            </x-jet-button>
        </div>
        <div class="flex flex-col mt-10">
            <div class="flex border-b-2 border-gray-200 text-sm sm:text-xl">
                {{ $count}} deliveries found
            </div>
            @foreach ($tasks as $task)
            <div wire:key="{{ $task->id }}" class="flex flex-col sm:flex-row .shadow-lg  border-b-2 border-gray-200">
                <div class="flex flex-col sm:flex-row sm:w-8/12 space-y-2">
                    @isset($task->photo)
                    <div class="w-28 sm:self-center">
                        <img src=" {{ url($task->photo) }}" alt="item photo" class="p-2">
                    </div>
                    @else
                    <div class="w-28 px-2 self-center bg-gray-600">
                    </div>
                    @endisset

                    <div class="w-full">
                        <div class="text-xl font-bold uppercase">{{ $task->title }}</div>
                        <div>{{ $task->simple_from_address }}
                            <span class="px-2 text-gray-500 self-center">@icon('long-arrow-alt-right
                                ')</span>
                            {{ $task->simple_to_address }}</div>
                        <div>
                            {{ "Fits in a ". $task->size.', '.$task->total_distance.' km, Posted '.$task->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="flex sm:w-2/5 sm:px-2 font-bold text-2xl sm:self-center sm:justify-end">
                        {{ $task->total_delivery_cost}} NOK
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row lg:w-4/12 sm:self-center">
                    <div class="flex flex-row lg:w-5/12">
                        <div class="w-12 pr-2 sm:px-2">
                            <img src="{{ asset('/storage/'.$task->photo) }}" alt="img"
                                class="rounded-full w-12 h-12 object-scale-down" />
                        </div>
                        <div class="text-sm">
                            <div class="text-gray-400">SENDER</div>
                            <div class="uppercase text-gray-800">{{ $task->user_name }}</div>
                        </div>
                    </div>
                    <div class="flex flex-col lg:w-7/12">
                        <x-jet-button wire:click="detail({{ $task->id }})"
                            class="w-full border-2 border-gray-200 bg-green-500 text-white hover:text-gray-600 hover:bg-red-400 justify-center">
                            See
                            more details &nbsp @icon('hand-point-right')
                        </x-jet-button>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="mt-10">
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</div>
{{-- <img src="{{ asset('storage/'.$users->where('id', $task->user_id)->get('profile_photo_path')) }}"
--}}
