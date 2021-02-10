<div>
    @include('livewire.components.sessionMessage')
    @include('livewire.sending.delete-task-confirmation')
    @include('livewire.components.photo-upload-modal')
    <div class="flex flex-col md:flex-row flex-wrap m-6 justify-between border-b-2 border-gray-200">
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
            <div class="md:w-3/6 m-4">
                <div class="text-2xl font-bold uppercase">{{ $title }}</div>
                <div>Pickup from : <span class="font-bold">{{ $fromAddress }}</span></div>
                <div>Deliver to : <span class="font-bold">{{ $toAddress }}</span></div>
                <div>Delivery date : <span class="font-bold">{{ $toDate.', '.$toTime }}</span></div>
                <div class="text-lg">
                    {{ "Fits in a ". $size.', '.$totalDistance.' km'}}
                </div>
                <br />
                <div>Bringer's reward <span class="font-bold">{{ $reward }} NOK</span></div>
                <div>Insurance and Service fee <span class="font-bold">{{ $serviceCharge }} NOK</span></div>
                <div>Included insurance <span class="font-bold">{{ $insuranceCost }} NOK</span></div>
            </div>
            <div class="flex flex-col md:w-2/6 m-4 md:self-start md:justify-end md:text-right">
                <span class="text-gray-600">Total delivery cost</span>
                <span class="font-bold text-4xl ">{{ $totalDeliveryCost}} NOK</span>
                <span>Inclusive of VAT if applicable</span>
                <x-jet-button
                    class="w-full md:w-7/12 border-2 md:self-end border-gray-200 bg-green-500 text-white hover:text-gray-600 hover:bg-red-400 justify-center">
                    See
                    more details &nbsp @icon('hand-point-right')
                </x-jet-button>
            </div>
        </div>
    </div>
    <div class="flex flex-col mx-4 md:mx-20 text-center">
        <div class="">Sit back and relax, we've notified our community of bringers about your delivery. Once we
            find a match
            we'll let you knoe. In the meantime, add more details below. The more information you share the easier
            it is to get a match.
        </div>
        <div class="mt-10 text-gray-500">
            <span>The more information you have the better.</span>
        </div>
        <button wire:click="modalToggleEdit" class="flex mx-auto p-4 border-gray-400 border-2 text-xl font-bold m-2">
            <span class="self-center">@icon('plus')&nbsp Add more information</span>
        </button>
        <div class="flex flex-row w-1/2 mx-auto justify-evenly space-x-4">
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
    <div>
        <div id="editForm" class="w-8/12 mx-auto">
            <div name="title">
                Edit Task
            </div>
            <div name="content">
                <div class="flex flex-col w-full mx-auto text-center">
                    <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                        <div class="flex flex-col md:flex-row w-full text-gray-500 text-left">
                            <div class="w-full sm:w-1/3 text-gray-500 ml-0">
                                <img src="{{ asset('images/steps/trygg-logo.png') }}" class="w-1/3 h-auto"
                                    alt="tryg insurance logo">
                            </div>
                            <span class="w-full mx-2 md:mx-0 text-left font-semibold">Your item is insured for any
                                damage up
                                to
                                10,000
                                NOK</span>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                        <div class="flex w-1/3 text-gray-500 text-left">Photo</div>
                        <div class="flex flex-row w-full text-gray-500 ml-0">
                            @isset($photo)
                            <div class="w-1/2 text-gray-400 text-left">
                                <span>Photo included</span>
                            </div>
                            <button wire:click="modalTogglePhoto" class="w-1/2 m-auto text-green-500 text-right">
                                <span>Edit</span>
                            </button>
                            @else
                            <div class="w-1/2 text-gray-400 text-left">
                                <span>Not set</span>
                            </div>
                            <button wire:click="modalTogglePhoto" class="w-1/2  m-auto text-green-500 text-right">
                                <span>Add</span>
                            </button>
                            @endisset
                        </div>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                    <div class="flex w-1/3 text-gray-500 text-left">Title</div>
                    <div class="flex flex-row w-full text-gray-500 ml-0">
                        <input wire:model="title" class="w-1/2 text-gray-400 text-left" />
                        <button class="w-1/2 text-green-500 text-right">Edit</button>
                    </div>
                </div>


                <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                    <div class="flex w-1/3 text-gray-500 text-left">
                        <span class="flex w-1/2">Total Cost</span>
                    </div>
                    <div class="flex flex-col w-full text-gray-500 ml-0">
                        <div class="flex w-full">
                            <input wire:model.debounce.1000ms="recommendedCost" id="recommendedCost"
                                class="w-1/2 text-2xl font-bold outline-none border-transparent" type="number"
                                name="recommendedCost" required />
                            <button wire:click="getRecommendedCostManually"
                                class="w-1/2 md:text-xl text-cool-gray-50 bg-green-600 font-extrabold justify-evenly rounded-md">
                                Calculate
                            </button>
                        </div>
                        <div class="flex flex-row w-full justify-between mb-0">
                            <h3 class="">Delivery helper's reward</h3>
                            <span class="ml-1 font-extrabold">{{ $reward.' NOK' }}</span>
                        </div>
                        <div class="flex flex-row w-full justify-between mb-0">
                            <h3>Service fee, (Delivery Friends)</h3>
                            <span class="ml-1 font-extrabold">{{ $serviceCharge.' NOK' }}</span>
                        </div>
                        <div class="flex flex-row w-full justify-between mb-0">
                            <h3>Included insurance</h3>
                            <span class="ml-1 font-extrabold">@icon('question-circle'){{ $insuranceCost.' NOK' }}</span>
                        </div>
                    </div>
                </div>


                <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                    <div class="flex w-1/3 text-gray-500 text-left">From - To</div>
                    <div class="flex flex-row w-full text-gray-500 ml-0 text-left">
                        <div class="flex flex-col w-3/4">
                            <input wire:model="fromAddress" type="text" placeholder="From">
                            <input wire:model="toAddress" type="text" placeholder="To">
                        </div>
                        <button class="w-1/4 text-green-500 text-right">Edit</button>
                    </div>
                </div>


                <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                    <div class="flex w-1/3 text-gray-500 text-left">Description</div>
                    <div class="flex flex-row w-full text-gray-500 ml-0">
                        <input wire:model="note" class="w-1/2 text-gray-400 text-left" />
                        <button class="w-1/2 text-green-500 text-right">Edit</button>
                    </div>
                </div>


                <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                    <div class="flex w-1/4 text-gray-500 text-left">Size</div>
                    <div class="flex flex-row w-3/4 justify-between text-left">
                        <input wire:model="size" type="radio" name="size" value="POCKET" id="POCKET"
                            class="flex mx-2 w-6 h-6 border-2 border-gray-400">
                        <label for="POCKET" class="flex self-center">Walk</label>
                        <input wire:model="size" type="radio" name="size" value="BAG" id="BAG"
                            class="flex mx-2 w-6 h-6 border-2 border-gray-400">
                        <label for="BAG" class="flex self-center">Bike</label>
                        <input wire:model="size" type="radio" name="size" value="CAR" id="CAR"
                            class="flex mx-2 w-6 h-6 border-2 border-gray-400">
                        <label for="CAR" class="flex self-center">CAR</label>
                        <input wire:model="size" type="radio" name="size" value="SUV" id="SUV"
                            class="flex mx-2 w-6 h-6 border-2 border-gray-400">
                        <label for="SUV" class="flex self-center">SUV</label>
                        <input wire:model="size" type="radio" name="size" value="VAN" id="VAN"
                            class="flex mx-2 w-6 h-6 border-2 border-gray-400">
                        <label for="VAN" class="flex self-center">VAN</label>
                    </div>
                </div>


                <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                    <div class="flex w-1/3 text-gray-500 text-left">Weight</div>
                    <div class="flex flex-row w-full text-gray-500 ml-0">
                        <input wire:model="weight" class="w-1/2 text-gray-400 text-left" />
                        <button class="w-1/2 text-green-500 text-right">Edit</button>
                    </div>
                </div>


                <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                    <div class="flex w-1/3 text-gray-500 text-left">Delivered by</div>
                    <div class="flex flex-row w-full text-gray-500 ml-0">
                        <input wire:model="toDate" class="w-1/2 text-gray-400 text-left" placeholder="toDate" />
                        <input wire:model="toTime" class="w-1/2 text-gray-400 text-left" placeholder="toTime" />
                        <button class="w-1/2 text-green-500 text-right">Edit</button>
                    </div>
                </div>


                <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                    <div class="flex w-1/3 text-gray-500 text-left">
                        <span class="flex w-full">Extra needs</span>
                    </div>
                    <div class="flex flex-col w-full text-gray-500 ml-0 justify-between">
                        <div class="flex flex-row w-full justify-between mb-0">
                            <h3 class="">Is it fragle?</h3>
                            <div class="flex flex-row justify-around">
                                <input wire:model.debounce.1000ms="isFraglile" type="radio" name="isFraglile" value="1"
                                    id="isFraglileYes"
                                    class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                                <label for="isFraglileYes" class="flex self-center">Yes</label>
                                <input wire:model.debounce.1000ms="isFraglile" type="radio" name="isFraglile" value="0"
                                    id="isFraglileNo"
                                    class="mx-2 w-6 h-8 bg-red-400 text-white border-2 border-gray-400 rounded-md hover:bg-red-600 {{ $isFraglile === true ? 'bg-red-600' : 'bg-gray-600' }}"
                                    checked>
                                <label for="isFraglileNo" class="flex self-center">No</label>
                            </div>
                        </div>
                        <div class="flex flex-row w-full justify-between mb-0">
                            <h3>Does need an animal cage?</h3>
                            <div class="flex flex-row justify-around">
                                <input wire:model="needAnimalCage" type="radio" name="needAnimalCage" value="1"
                                    class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                                <label for="needAnimalCageYes" class="flex self-center">Yes</label>
                                <input wire:model="needAnimalCage" type="radio" name="needAnimalCage" value="0"
                                    class="mx-2 w-6 h-8 bg-red-400 text-white border-2 border-gray-400 rounded-md hover:bg-red-600 {{ $needAnimalCage === true ? 'bg-red-600' : 'bg-gray-600' }}"
                                    checked>
                                <label for="needAnimalCage" class="flex self-center">No</label>
                            </div>
                        </div>
                        <div class="flex flex-row w-full justify-between mb-0">
                            <h3>Does it need cooling equipment?</h3>
                            <div class="flex flex-row justify-around">
                                <input wire:model.debounce.1000ms="needCoolingEquipment" type="radio"
                                    name="needCoolingEquipment" value="1"
                                    class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                                <label for="needCoolingEquipmentYes" class="flex self-center">Yes</label>
                                <input wire:model.debounce.1000ms="needCoolingEquipment" type="radio"
                                    name="needCoolingEquipment" value="0"
                                    class="mx-2 w-6 h-8 bg-red-400 text-white border-2 border-gray-400 rounded-md hover:bg-red-600 {{ $needCoolingEquipment === true ? 'bg-red-600' : 'bg-gray-600' }}"
                                    checked>
                                <label for="needCoolingEquipmentNo" class="flex self-center">No</label>
                            </div>
                        </div>
                        <div class="flex flex-row w-full justify-between mb-0">
                            <h3>Need help with wrapping?</h3>
                            <div class="flex flex-row justify-around">
                                <input wire:model.debounce.1000ms="needHelpWrapping" type="radio"
                                    name="needHelpWrapping" value="1"
                                    class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                                <label for="needHelpWrappingYes" class="flex self-center">Yes</label>
                                <input wire:model.debounce.1000ms="needHelpWrapping" type="radio"
                                    name="needHelpWrapping" value="0"
                                    class="mx-2 w-6 h-8 bg-red-400 text-white border-2 border-gray-400 rounded-md hover:bg-red-600 {{ $needHelpWrapping === true ? 'bg-red-600' : 'bg-gray-600' }}"
                                    checked>
                                <label for="needHelpWrappingNo" class="flex self-center">No</label>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                    <div class="flex w-1/3 text-gray-500 text-left">
                        <span class="flex w-full">Help (pickup)</span>
                    </div>
                    <div class="flex flex-col w-full text-gray-500 ml-0 justify-between">
                        <div class="flex flex-row w-full justify-between mb-0">
                            <h3 class="">Can someone help with carrying here?</h3>
                            <div class="flex flex-row justify-around">
                                <input wire:model.debounce.1000ms="helpPickUp" type="radio" name="helpPickUp" value="1"
                                    class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                                <label for="helpPickUpYes" class="flex self-center">Yes</label>
                                <input wire:model.debounce.1000ms="helpPickUp" type="radio" name="helpPickUp" value="0"
                                    class="mx-2 w-6 h-8 bg-red-400 text-white border-2 border-gray-400" checked>
                                <label for="helpPickUpNo" class="flex self-center">No</label>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                    <div class="flex w-1/3 text-gray-500 text-left">
                        <span class="flex w-full">Help (delivery)</span>
                    </div>
                    <div class="flex flex-col w-full text-gray-500 ml-0 justify-between">
                        <div class="flex flex-row w-full justify-between mb-0">
                            <h3 class="">And can someone help to carry here?</h3>
                            <div class="flex flex-row justify-around">
                                <input wire:model.debounce.1000ms="helpDelivery" type="radio" name="helpDelivery"
                                    value="1"
                                    class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                                <label for="helpDeliveryYes" class="flex self-center">Yes</label>
                                <input wire:model.debounce.1000ms="helpDelivery" type="radio" name="helpDelivery"
                                    value="0" class="mx-2 w-6 h-8 bg-red-400 text-white border-2 border-gray-400"
                                    checked>
                                <label for="helpDeliveryNo" class="flex self-center">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                <div class="text-pink-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="text-right my-4">
                    <x-jet-secondary-button wire:click="">
                        {{ __('Cancel') }}
                    </x-jet-secondary-button>
                    <x-jet-danger-button wire:click="publishTask" class="ml-2" wire:loading.attr="disabled">
                        {{ __('Save') }}
                    </x-jet-danger-button>
                </div>
            </div>
        </div>

    </div>
    <x-jet-secondary-button wire:click="$emit('moveBack')" class=" mx-1">
        {{ __('move back') }}
    </x-jet-secondary-button>
    <x-jet-secondary-button wire:click='$refresh' class="mx-1">
        {{ __('Refresh This page') }}
    </x-jet-secondary-button>
</div>
