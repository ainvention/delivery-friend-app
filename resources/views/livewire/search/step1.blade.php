<div>
    @if($page == 'home')
    <div class="flex flex-col justify-center my-10 px-2 bg-white rounded-lg  text-gray-500  sm:tracking-widest">
        @include('livewire.components.sessionMessage')

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
        <div class="flex w-full flex-col sm:flex-row justify-between">
            <input wire:model="fromAddress" class="flex w-full border-2 border-gray-300 mx-0 sm:mx-2 rounded-xl"
                type="text" placeholder=" Send from">
            <input wire:model="toAddress" class="flex w-full  border-2 border-gray-300 mx-0 sm:mx-2 rounded-xl"
                type="text" placeholder=" Delivery To">
            <input wire:click="$emit('modalToggle')"
                class="flex w-full  border-2 border-gray-300 mx-0 sm:mx-2 rounded-xl" type="text"
                placeholder=" Detail info">
            <x-jet-button wire:click="searchTask"
                class="flex w-full border-2 border-gray-200 bg-blue-500 text-white hover:text-gray-600 hover:bg-red-400 justify-center mx-0 sm:mx-2">
                {{ __('Search') }}
            </x-jet-button>
        </div>
        {{-- search box modal start --}}
        @livewire('search.searchbox')
        <div class="flex flex-col mt-10">
            <div class="flex border-b-2 border-gray-300 text-xl">
                Total {{ $count}} deliveries found
            </div>
            @foreach ($tasks as $task)
            <div wire:click="$emit('moveDetailPage', {{ $task->id}})" wire:key="{{ $loop->index }}"
                class="flex flex-col sm:flex-row py-4 .shadow-lg  border-b-2 border-gray-300">
                <div class="flex flex-col sm:flex-row sm:w-8/12 space-y-2">
                    @isset($task->photo)
                    <div class="w-24 sm:self-center">
                        <img src=" {{ url($task->photo) }}" alt="item photo" class="p-2 object-scale-down">
                    </div>
                    @else
                    <div class="w-12 mx-2 sm:self-center text-center">
                        <svg class="block m-auto h-10" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    @endisset

                    <div class="w-full">
                        <div class="flex text-xl font-bold uppercase">{{ $task->title }}</div>
                        <div>
                            <span>{{ $task->simple_from_address }}
                                <span class="px-2 text-gray-500 self-center">@icon('long-arrow-alt-right')
                                    {{ $task->simple_to_address }}
                                </span>
                            </span>
                        </div>
                        <div class="flex w-full">
                            {{ "Fits in a ". $task->size.', '.$task->total_distance.' km, Posted '.$task->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="flex sm:w-2/5 sm:px-2 font-bold text-2xl sm:self-center sm:justify-end">
                        {{ $task->total_delivery_cost}} NOK
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row lg:w-4/12 sm:self-center">
                    <div class="flex flex-row lg:w-5/12">
                        <div class="w-14 pr-2 sm:px-2">
                            @if(DB::table('users')->where('id', $task->user_id)->value('profile_photo_path') !==
                            null)
                            <img src="{{ url('storage/'.DB::table('users')->where('id', $task->user_id)->value('profile_photo_path')) }}"
                                alt="img" class="rounded-full w-12 h-12 object-cover">
                            @else
                            <img src="{{ url('storage/profile-photos/defaultAvatar.png') }}"
                                class="flex w-10 h-10 self-center rounded-full object-cover">
                            @endif
                        </div>
                        <div class="flex flex-row sm:flex-col text-sm self-center">
                            <div class="uppercase text-gray-800">{{ $task->user_name }}</div>
                        </div>
                    </div>
                    <div class="flex flex-col lg:w-7/12 sm:mx-2">
                        <x-jet-button
                            class="w-full border-2 border-gray-200 bg-green-500 text-white hover:text-gray-600 hover:bg-red-400 justify-center">
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
    @elseif($page == 'detail')
    @livewire('search.detail-page', ['selectedTask' => $selectedTask])
    @endif
</div>



{{-- <img src="{{ asset('storage/'.$users->where('id', $task->user_id)->get('profile_photo_path')) }}"
--}}
