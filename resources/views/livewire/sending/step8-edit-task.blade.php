<div>
    @include('livewire.components.sessionMessage')
    @include('livewire.sending.delete-task-confirmation')
    <div class="flex flex-col sm:flex-row flex-wrap m-6 justify-between border-b-2 border-gray-200">
        <div class="flex flex-col sm:flex-row sm:w-8/12 space-y-2">
            @isset($photo)
            <div class="w-1/4 sm:self-center">
                <img src=" {{ asset('storage/'.$photo) }}" alt="item photo" class="p-2">
            </div>
            @else
            <div class="w-1/4 px-2 self-center bg-gray-600">
                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" class="max-w-sm">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: none;
                            }
                        </style>
                    </defs>
                    <title />
                    <g data-name="Layer 2" id="Layer_2">
                        <path
                            d="M26,27H6a3,3,0,0,1-3-3V8A3,3,0,0,1,6,5H26a3,3,0,0,1,3,3V24A3,3,0,0,1,26,27ZM6,7A1,1,0,0,0,5,8V24a1,1,0,0,0,1,1H26a1,1,0,0,0,1-1V8a1,1,0,0,0-1-1Z" />
                        <path d="M21,15a3,3,0,1,1,3-3A3,3,0,0,1,21,15Zm0-4a1,1,0,1,0,1,1A1,1,0,0,0,21,11Z" />
                        <path
                            d="M26,27a1,1,0,0,1-.83-.45l-4.34-6.5a1,1,0,0,0-1.66,0l-.34.5a1,1,0,0,1-1.66-1.1l.33-.51a3,3,0,0,1,5,0l4.33,6.51a1,1,0,0,1-.28,1.38A.94.94,0,0,1,26,27Z" />
                        <path
                            d="M6,27a1,1,0,0,1-.54-.16,1,1,0,0,1-.3-1.38l6.23-9.62a3,3,0,0,1,2.5-1.37h0a3,3,0,0,1,2.5,1.34l6.42,9.64a1,1,0,0,1-1.66,1.1l-6.43-9.63a1,1,0,0,0-.83-.45h0a1,1,0,0,0-.83.46L6.84,26.54A1,1,0,0,1,6,27Z" />
                    </g>
                    <g id="frame">
                        <rect class="cls-1" height="32" width="32" />
                    </g>
                </svg>
            </div>
            @endisset


            <div class="w-full">
                <div class="text-xl font-bold uppercase">{{ $title }}</div>
                <div>{{ $fromAddress }}
                    <span class="px-2 text-gray-500 self-center">@icon('long-arrow-alt-right
                        ')</span>
                    {{ $toAddress }}</div>
                <div class="">
                    {{ "Fits in a ". $size.', '.$totalDistance.' km'}}
                </div>
            </div>
            <div class="flex sm:w-2/5 sm:px-10 font-bold text-2xl sm:self-center sm:justify-end">
                {{ $totalDeliveryCost}} NOK
            </div>
        </div>
        <div class="flex flex-col lg:flex-row lg:w-4/12 sm:self-center">
            <div class="flex flex-row lg:w-2/5">
                <div class="w-12 pr-2 sm:px-2 ">
                    <img src="{{ asset('storage/'.$photo) }}" alt="user avatar"
                        class="rounded-full w-12 h-12 object-scale-down" />
                </div>
            </div>
            <div class="flex flex-col lg:w-3/5">
                <x-jet-button
                    class="w-full border-2 border-gray-200 bg-green-500 text-white hover:text-gray-600 hover:bg-red-400 justify-center">
                    See
                    more details &nbsp @icon('hand-point-right')
                </x-jet-button>
            </div>
        </div>
    </div>
    <div class="flex flex-col m-20 mx-72 text-center">
        <div class="">Sit back and relax, we've notified our community of bringers about your delivery. Once we
            find a match
            we'll let you knoe. In the meantime, add more details below. The more information you share the easier
            it is to get a match.
        </div>
        <div class="mt-10">
            <span>The more information you have the better.</span>
        </div>
        <button>Add more information</button>
        <div>
            <div>
                <span>Views</span>
                <span class="flex-auto pl-3 text-gray-300 self-center">@icon('eye')</span>
            </div>
            <div><span>Bringers notified</span>
                <span class="flex-auto pl-3 text-gray-300 self-center">@icon('users')</span>
            </div>
        </div>
    </div>
    <x-jet-button wire:click="modalToggle"
        class="flex flex-shrink m-2 md:text-xl text-red-500 bg-opacity-25 font-extrabold justify-evenly">
        Delete your task
    </x-jet-button>
    <div class="grid grid-cols-1 divide-y divide-gray-500">
        <div class="grid grid-cols-1 divide-y divide-gray-500">
            <table>
                <thead>Your item is Insured for any damage up to 10.000 NOK</thead>
                <tr class="flex flex-col">
                    <td class="flex flex-col sm:flex-row space-x-20">
                        <div>
                            <div>Photo</div>
                            @isset($photo)
                            <div><img src="{{ $photo }}" alt=""></div>
                            <div><button>Edit photo</button></div>
                            @endisset
                            <div><span>Not set</span></div>
                            <div><button>Add photo</button></div>
                        </div>
                    </td>
                    <td class="flex flex-col sm:flex-row space-x-20">
                        <div>Title</div>
                        <div>asdf</div>
                        <x-jet-button wire:click="editTask"
                            class="flex flex-shrink m-2 md:text-xl text-red-500 bg-opacity-25 font-extrabold justify-evenly">
                            Edit
                        </x-jet-button>
                    </td>
                    <td class="flex flex-col sm:flex-row space-x-20">
                        <div>
                            <div>Total Cost</div>
                            <div></div>
                            <div></div>
                        </div>
                    </td>
                    <td class="flex flex-col sm:flex-row space-x-20">

                        <div>From-To</div>
                        <div></div>
                        <div></div>

                    </td>
                    <td class="flex flex-col sm:flex-row space-x-20">

                        <div>Description</div>
                        <div></div>
                        <div></div>

                    </td>
                    <td class="flex flex-col sm:flex-row space-x-20">

                        <div>Size</div>
                        <div></div>
                        <div></div>

                    </td>
                    <td class="flex flex-col sm:flex-row space-x-20">

                        <div>Weight</div>
                        <div></div>
                        <div></div>

                    </td>
                    <td class="flex flex-col sm:flex-row space-x-20">

                        <div>Delivered by</div>
                        <div></div>
                        <div></div>

                    </td>
                    <td class="flex flex-col sm:flex-row space-x-20">

                        <div>Extra needs</div>
                        <div></div>
                        <div></div>

                    </td>
                    <td class="flex flex-col sm:flex-row space-x-20">

                        <div>Help (pickup)</div>
                        <div></div>
                        <div></div>

                    </td>
                    <td class="flex flex-col sm:flex-row space-x-20">

                        <div>Help (delivery)</div>
                        <div></div>
                        <div></div>

                    </td>
                </tr>
            </table>
        </div>
    </div>
    <x-jet-secondary-button wire:click="$emit('moveBack')" class=" mx-1">
        {{ __('move back') }}
    </x-jet-secondary-button>
    <x-jet-secondary-button wire:click='$refresh' class="mx-1">
        {{ __('Refresh This page') }}
    </x-jet-secondary-button>
</div>
