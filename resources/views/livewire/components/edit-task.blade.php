<div x-data="{ openEdit: $wire.entangle('openEdit') }" wire:key="editTaskDropDownPageKey" class="flex flex-col mb-10">
    <div x-show="!openEdit" class="my-10">
        <div class="w-full mx-4 text-xl text-yellow-500 text-left md:mx-auto md:text-center ">
            <span>We recommend that,</span>
            <br />
            <span>If you have more details on this task, you can find the helper more faster.</span>
        </div>
        <button @click="openEdit = true"
            class="flex mx-auto p-4 bg-yellow-400 border-gray-400 border-2 text-xl font-bold m-2 my-6 hover:bg-black text-white rounded-md mb-10">
            <span class="self-center">@icon('plus')&nbsp Add more information</span>
        </button>
    </div>
    <div x-show="openEdit" class="w-11/12 mx-6 md:w-8/12 md:mx-auto .leading-relaxed">
        <div name="title">

        </div>
        <div name="content">
            <div class="flex flex-col w-full mx-auto text-center">
                <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                    <div class="flex flex-col md:flex-row w-full text-gray-500 text-left">
                        <div class="w-full sm:w-1/3 text-gray-500 ml-0">
                            <img src="{{ secure_asset('images/steps/trygg-logo.png') }}" class="w-1/3 h-auto"
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
                        <div class="flex w-3/4 text-red-600 text-left">
                            <span>Photo included</span>
                        </div>
                        <button wire:click.prevent="modalTogglePhoto"
                            class="w-1/4 flex m-auto text-green-500 justify-end">
                            <span>Edit</span>
                        </button>
                        @else
                        <div class="flex w-3/4 text-gray-400 text-left">
                            <span>Not set</span>
                        </div>
                        <button wire:click.prevent="modalTogglePhoto"
                            class="flex w-1/4 m-auto text-green-500 justify-end">
                            <span>Add</span>
                        </button>
                        @endisset
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                <div class="flex w-1/3 text-gray-500 text-left">Title</div>
                <div class="flex flex-row w-full text-gray-500 ml-0">
                    <input wire:model="title" class="flex w-full text-gray-400 text-left" />
                </div>
            </div>


            <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                <div class="flex flex-col w-1/3 text-gray-500 text-left">
                    <span class="flex w-1/2">Total Cost</span>
                    <span class="text-xs text-green-500">1. Enter your estimated amount.<br />
                        2. Then 'click' Calculate
                        button</span>
                </div>
                <div class="flex flex-col w-full text-gray-500 ml-0">
                    <div class="flex w-full space-x-2 justify-between">
                        <input wire:model.defer="recommendedCost" id="recommendedCost"
                            class="w-2/5 text-2xl font-bold outline-none border-transparent border-2 border-green-500 rounded-md"
                            type="number" name="recommendedCost" required />
                        <span class="text-left text-xl font-bold self-center">NOK</span>
                        <button wire:click.prevent="getRecommendedCostManually"
                            class="w-2/5 md:text-xl text-cool-gray-50 bg-green-600 font-extrabold justify-evenly rounded-md">
                            Calculate
                        </button>
                    </div>
                    <div class="flex flex-row w-full justify-between mb-0">
                        <h3>Delivery helper's reward</h3>
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
                    <div class="flex flex-col w-full">
                        <input wire:model="fromAddress" type="text" placeholder="From">
                        <input wire:model="toAddress" type="text" placeholder="To">
                    </div>
                </div>
            </div>


            <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                <div class="flex w-1/3 text-gray-500 text-left">Description</div>
                <div class="flex flex-row w-full text-gray-500 ml-0">
                    <input wire:model="note"
                        class="w-full text-gray-400 text-left {{ empty($note) ? 'bg-green-100 border-2 border-green-500 rounded-md' : '' }}"
                        placeholder="type some more detail info." />
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
                <div class="flex w-1/3 text-gray-500 text-left">Weight(Kg)</div>
                <div class="flex flex-row w-full text-gray-500 ml-0">
                    <input wire:model="weight" type="number"
                        class="w-full text-gray-400 text-left border-2 {{ empty($weight) ? 'bg-green-100 border-2 border-green-500 rounded-md' : '' }}"
                        placeholder="type item weights" />
                </div>
            </div>


            <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                <div class="flex w-1/3 text-gray-500 text-left">Delivered by</div>
                <div class="flex flex-row w-full text-gray-500 ml-0">
                    <div class="flex flex-row w-1/2 m-0 space-x-2 justify-evenly">
                        @if($toDate !== null)
                        <span class="w-2/3">{{$toDate}}</span>
                        @else
                        <span class="w-2/3">{{date('d. M. Y', strtotime($toDateManually))}}</span>
                        @endisset
                        <x-jet-dropdown class="w-full">
                            <x-slot name="trigger">
                                <button class="p-1 text-white bg-green-600 rounded-md">{{ __('Edit Date') }}</button>
                            </x-slot>
                            <x-slot name="content">
                                @include('livewire.components.insert-date')
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <span class="w-10 text-center">/</span>
                    <div class="flex flex-row w-1/2 m-0 space-x-2 justify-evenly">
                        @if($toTime !== null)
                        <span class="w-2/3">{{$toTime}}</span>
                        @else
                        <span class="w-2/3">{{date('H:i', strtotime($toTimeManually))}}</span>
                        @endisset
                        <x-jet-dropdown class="w-full">
                            <x-slot name="trigger">
                                <button class="p-1 text-white bg-green-600 rounded-md">{{ __('Edit Time') }}</button>
                            </x-slot>
                            <x-slot name="content">
                                @include('livewire.components.insert-time')
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                </div>
            </div>


            <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                <div class="flex w-1/3 text-gray-500 text-left">
                    <span class="flex w-full">Extra needs</span>
                </div>
                <div class="flex flex-col w-full text-gray-500 ml-0 justify-between">
                    <div class="flex flex-row w-full justify-between mb-0">
                        <h3>Is it fragle?</h3>
                        <div class="flex flex-row md:w-1/2 lg:justify-evenly">
                            <input wire:model="isFraglile" type="radio" name="isFraglile" value="1" id="isFraglileYes"
                                class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                            <label for="isFraglileYes" class="flex self-center">Yes</label>
                            <input wire:model="isFraglile" type="radio" name="isFraglile" value="0" id="isFraglileNo"
                                class="mx-2 w-6 h-8 bg-red-400 text-white border-2 border-gray-400 rounded-md hover:bg-red-600 {{ $isFraglile === true ? 'bg-red-600' : 'bg-gray-600' }}"
                                checked>
                            <label for="isFraglileNo" class="flex self-center">No</label>
                        </div>
                    </div>
                    <div class="flex flex-row w-full justify-between mb-0">
                        <h3>Does need an animal cage?</h3>
                        <div class="flex flex-row md:w-1/2 lg:justify-evenly">
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
                        <div class="flex flex-row md:w-1/2 lg:justify-evenly">
                            <input wire:model="needCoolingEquipment" type="radio" name="needCoolingEquipment" value="1"
                                class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                            <label for="needCoolingEquipmentYes" class="flex self-center">Yes</label>
                            <input wire:model="needCoolingEquipment" type="radio" name="needCoolingEquipment" value="0"
                                class="mx-2 w-6 h-8 bg-red-400 text-white border-2 border-gray-400 rounded-md hover:bg-red-600 {{ $needCoolingEquipment === true ? 'bg-red-600' : 'bg-gray-600' }}"
                                checked>
                            <label for="needCoolingEquipmentNo" class="flex self-center">No</label>
                        </div>
                    </div>
                    <div class="flex flex-row w-full justify-between mb-0">
                        <h3>Need help with wrapping?</h3>
                        <div class="flex flex-row md:w-1/2 lg:justify-evenly">
                            <input wire:model="needHelpWrapping" type="radio" name="needHelpWrapping" value="1"
                                class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                            <label for="needHelpWrappingYes" class="flex self-center">Yes</label>
                            <input wire:model="needHelpWrapping" type="radio" name="needHelpWrapping" value="0"
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
                        <h3>Can someone help with carrying here?</h3>
                        <div class="flex flex-row md:w-1/2 justify-evenly">
                            <input wire:model="helpPickUp" type="radio" name="helpPickUp" value="1"
                                class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                            <label for="helpPickUpYes" class="flex self-center">Yes</label>
                            <input wire:model="helpPickUp" type="radio" name="helpPickUp" value="0"
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
                        <h3>And can someone help to carry here?</h3>
                        <div class="flex flex-row md:w-1/2 justify-evenly">
                            <input wire:model="helpDelivery" type="radio" name="helpDelivery" value="1"
                                class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                            <label for="helpDeliveryYes" class="flex self-center">Yes</label>
                            <input wire:model="helpDelivery" type="radio" name="helpDelivery" value="0"
                                class="mx-2 w-6 h-8 bg-red-400 text-white border-2 border-gray-400" checked>
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
                <x-jet-secondary-button wire:click.prevent="cancelEditTask">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-danger-button wire:click.prevent="publishTask" class="ml-2">
                    {{ __('Save') }}
                </x-jet-danger-button>
            </div>
        </div>
    </div>
</div>
