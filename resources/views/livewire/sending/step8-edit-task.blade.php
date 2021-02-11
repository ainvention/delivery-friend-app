<div>
    @include('livewire.components.sessionMessage')
    @include('livewire.sending.delete-task-confirmation')
    @include('livewire.components.photo-upload-modal')
    <div class="flex flex-col md:flex-row m-6 justify-between border-b-2 border-gray-200">
        <div class="flex flex-col md:flex-row md:w-full space-y-2 mb-6">
            @isset($photo)
            <div class="md:w-1/6 md:self-center">
                <img src=" {{ asset('storage/'.$photo) }}" alt="item photo" class="p-2">
            </div>
            @else
            <div class="md:w-1/6 m-2 self-center">
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
            <div class="flex flex-col w-full">
                <div class="flex flex-col md:flex-row w-full">
                    <div class="md:w-4/6 m-4 leading-relaxed">
                        <div class="text-2xl font-bold uppercase">{{ $title }}</div>
                        <div>Pickup from : <span class="font-bold">{{ $fromAddress }}</span></div>
                        <div>Deliver to : <span class="font-bold">{{ $toAddress }}</span></div>
                        <div>Delivery date / time : <span class="font-bold">
                                {{ isset($toDate) ? $toDate : date('d. M. Y', strtotime($toDateManually)) }}
                                <span>/</span>
                                {{ isset($toTime) ? $toTime : date('H:i', strtotime($toTimeManually)) }}</span></div>
                        <div class="text-lg">
                            {{ "Fits in a ". $size.', '.$totalDistance.' km'}}
                        </div>
                        <br />
                        <div>Bringer's reward <span class="font-bold">{{ $reward }} NOK</span></div>
                        <div>Insurance and Service fee <span class="font-bold">{{ $serviceCharge }} NOK</span></div>
                        <div>Included insurance <span class="font-bold">{{ $insuranceCost }} NOK</span></div>
                    </div>
                    <div class="flex flex-col md:w-2/6 m-4 md:self-start md:justify-end md:text-right leading-relaxed">
                        <span class="text-gray-600 text-xl font-bold">Total delivery cost</span>
                        <span class="font-bold text-4xl ">{{ $totalDeliveryCost}} NOK</span>
                        <span>Inclusive of VAT if applicable</span>
                        {{-- <x-jet-button
                    class="w-full md:w-7/12 border-2 md:self-end border-gray-200 bg-green-500 text-white hover:text-gray-600 hover:bg-red-400 justify-center">
                    See
                    more details &nbsp @icon('hand-point-right')
                </x-jet-button> --}}
                    </div>
                </div>
                <div class="flex flex-col w-full md:flex-row mx-2 space-y-2 md:space-y-0">
                    <div class="flex w-full md:w-1/6 mx-2 space-x-2">
                        <input wire:model.defer="isFraglile" type="checkbox" id="fraglile" name="fraglile"
                            class="w-6 h-6 mx-auto" readonly>
                        <label for="fraglile" class="w-full mx-auto">Fragle</label>
                    </div>
                    <div class="flex w-full md:w-1/6 mx-2 space-x-2">
                        <input wire:model.defer="needAnimalCage" type="checkbox" id="animalCage" name="animalCage"
                            class="w-6 h-6 mx-auto" readonly>
                        <label for="animalCage" class="w-full mx-auto">Animal Case</label>
                    </div>
                    <div class="flex w-full md:w-1/6 mx-2 space-x-2">
                        <input wire:model.defer="needCoolingEquipment" type="checkbox" id="coolingEquipment"
                            name="coolingEquipment" class="w-6 h-6 mx-auto" readonly>
                        <label for="coolingEquipment" class="w-full mx-auto">Cooling</label>
                    </div>
                    <div class="flex w-full md:w-1/6 mx-2 space-x-2">
                        <input wire:model.defer="needHelpWrapping" type="checkbox" id="helpWrapping" name="helpWrapping"
                            class="w-6 h-6 mx-auto" readonly>
                        <label for="helpWrapping" class="w-full mx-auto">Wrapping</label>
                    </div>
                    <div class="flex w-full md:w-1/6 mx-2 space-x-2">
                        <input wire:model.defer="helpPickUp" type="checkbox" id="pickUp" name="pickUp"
                            class="w-6 h-6 mx-auto" readonly>
                        <label for="pickUp" class="w-full mx-auto">Pickup help</label>
                    </div>
                    <div class="flex w-full md:w-1/6 mx-2 space-x-2">
                        <input wire:model.defer="helpDelivery" type="checkbox" id="delivery" name="delivery"
                            class="w-6 h-6 mx-auto" readonly>
                        <label for="delivery" class="w-full mx-auto">Delivery help</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col mx-4 text-lg space-y-2 text-left md:mx-20 md:text-center ">
        <div class="flex">Sit back and relax, we've notified our community of bringers about your delivery. Once we
            find a match
            we'll let you knoe. In the meantime, add more details below. The more information you share the easier
            it is to get a match.
        </div>
        <div class="flex flex-row w-1/2 mx-auto justify-evenly space-x-2">
            <div class="flex flex-col">
                <span class="text-gray-500">Views</span>
                <div class="flex flex-row space-x-2">
                    <span class="flex-auto text-gray-300 self-center">@icon('eye')</span>
                    <span class="font-bold text-xl">10</span>
                </div>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-500">Bringers notified</span>
                <div class="flex flex-row self-center space-x-2">
                    <span class="flex-auto text-gray-300 self-center">@icon('users')</span>
                    <span class="font-bold text-xl">138</span>
                </div>
            </div>
        </div>
    </div>

    {{-- divider --}}
    <div class="m-6 border-b-2 border-gray-200"></div>

    {{-- edit form start --}}
    @include('livewire.components.edit-task')
    {{-- edit form end --}}
    <x-jet-secondary-button wire:click="$emit('moveBack')" class=" mx-1">
        {{ __('move back') }}
    </x-jet-secondary-button>
    <x-jet-secondary-button wire:click='$refresh' class="mx-1">
        {{ __('Refresh This page') }}
    </x-jet-secondary-button>
</div>
