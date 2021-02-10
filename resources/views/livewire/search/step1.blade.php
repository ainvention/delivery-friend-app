<div>
    <div
        class="flex flex-col justify-center my-10 mx-4 xl:mx-4 px-2 bg-white rounded-lg  text-gray-500  sm:tracking-widest">
        @include('livewire.components.sessionMessage')
        @once
        @include('livewire.search.search-box')
        @endonce
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
                        <img src=" {{ asset('storage/'.$task->photo) }}" alt="item photo" class="p-2">
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
                        <div class="">
                            {{ "Fits in a ". $task->size.', '.$task->total_distance.' km, Posted'.$task->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="flex sm:w-2/5 sm:px-10 font-bold text-2xl sm:self-center sm:justify-end">
                        {{ $task->total_delivery_cost}} NOK
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row lg:w-4/12 sm:self-center">
                    <div class="flex flex-row lg:w-2/5">
                        <div class="w-12 pr-2 sm:px-2 ">
                            <img src="{{ asset('storage/'.$task->photo) }}" alt="user avatar"
                                class="rounded-full w-12 h-12 object-scale-down" />
                        </div>
                        <div class="text-sm">
                            <div class="text-gray-400">SENDER</div>
                            <div class="uppercase text-gray-800">{{ $task->user_name }}</div>
                        </div>
                    </div>
                    <div class="flex flex-col lg:w-3/5">
                        <x-jet-button wire:click="detail({{ $task->id }})"
                            class="w-full border-2 border-gray-200 bg-green-500 text-white hover:text-gray-600 hover:bg-red-400 justify-center">
                            See
                            more details &nbsp @icon('hand-point-right')
                        </x-jet-button>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="mt-4">
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</div>
{{-- <img src="{{ asset('storage/'.$users->where('id', $task->user_id)->get('profile_photo_path')) }}"
--}}
