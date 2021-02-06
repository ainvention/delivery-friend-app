<div>
    @include('livewire.components.sessionMessage')
    <div class="flex flex-col sm:flex-row flex-wrap justify-between">
        <div class="flex flex-col sm:flex-row">
            <img src="" alt="" class="w-80 h-auto">
            <div class="flex flex-col sm:flex-row">
                <div class="flex flex-col">
                    <span>{{ $title }}</span>
                    <span>{{ $size }}</span>
                    <span>Pickup from: {{ $fromAddress }}</span>
                    <span>Deliver to: {{ $toAddress }}</span>
                    <span>Delivery date: {{ $toDate }}</span>
                    <span class="mt-10">Bringer's reward{{ $rewards }}</span>
                    <span>Insurance and service fee{{ $serviceCharges }}</span>
                    <span>Included insurance{{ $insuranceCost }}</span>
                </div>
                <div class="flex flex-col">
                    <span>Total delivery cost:</span>
                    <span>{{ $totalDeliveryCosts }}</span>
                    <span>Inclusive of VAT if applicable</span>
                    <x-jet-secondary-button wire:click='' class="mx-1">
                        <span class="flex-auto text-gray-300 self-center">@icon('map')</span>
                        {{ __('Expand map') }}
                    </x-jet-secondary-button>

                </div>
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
    <x-jet-button wire:click="$()"
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
                        <x-jet-button wire:click=""
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
</div>
