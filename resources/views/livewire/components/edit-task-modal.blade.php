<x-jet-dialog-modal wire:model="modalSwitchEdit" id="editModal" wire:key="editTaskModalkey">
    <x-slot name="title">
        Edit Task
    </x-slot>
    <x-slot name="content">
        <div class="flex flex-col w-full mx-auto text-center">
            <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                <div class="flex flex-col md:flex-row w-full text-gray-500 text-left">
                    <div class="w-full sm:w-1/3 text-gray-500 ml-0">
                        <img src="{{ secure_asset('images/steps/trygg-logo.png') }}" class="w-1/3 h-auto"
                            alt="tryg insurance logo">
                    </div>
                    <span class="w-full mx-2 md:mx-0 text-left font-semibold">Your item is insured for any damage up
                        to
                        10,000
                        NOK</span>
                </div>
            </div>
            <div class="flex flex-col md:flex-row w-full justify-evenly py-1 border-gray-200 border-b-2">
                <div class="flex w-1/3 text-gray-500 text-left">Photo</div>
                <div class="flex flex-row w-full text-gray-500 ml-0">
                    @isset($photo)
                    <div class="w-1/2 text-red-600 text-left">
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
                    <h3>Is it fragle?</h3>
                    <div class="flex flex-row justify-around">
                        <input wire:model.debounce.1000ms="isFraglile" type="radio" name="isFraglile" value="true"
                            id="isFraglileYes"
                            class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                        <label for="isFraglileYes" class="flex self-center">Yes</label>
                        <input wire:model.debounce.1000ms="isFraglile" type="radio" name="isFraglile" value="false"
                            id="isFraglileNo"
                            class="mx-2 w-6 h-8 bg-red-400 text-white border-2 border-gray-400 rounded-md hover:bg-red-600 {{ $isFraglile === true ? 'bg-red-600' : 'bg-gray-600' }}"
                            checked>
                        <label for="isFraglileNo" class="flex self-center">No</label>
                    </div>
                </div>
                <div class="flex flex-row w-full justify-between mb-0">
                    <h3>Does need an animal cage?</h3>
                    <div class="flex flex-row justify-around">
                        <input wire:model="needAnimalCage" type="radio" name="needAnimalCage" value="true"
                            class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                        <label for="needAnimalCageYes" class="flex self-center">Yes</label>
                        <input wire:model="needAnimalCage" type="radio" name="needAnimalCage" value="false"
                            class="mx-2 w-6 h-8 bg-red-400 text-white border-2 border-gray-400 rounded-md hover:bg-red-600 {{ $needAnimalCage === true ? 'bg-red-600' : 'bg-gray-600' }}"
                            checked>
                        <label for="needAnimalCage" class="flex self-center">No</label>
                    </div>
                </div>
                <div class="flex flex-row w-full justify-between mb-0">
                    <h3>Does it need cooling equipment?</h3>
                    <div class="flex flex-row justify-around">
                        <input wire:model.debounce.1000ms="needCoolingEquipment" type="radio"
                            name="needCoolingEquipment" value="true"
                            class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                        <label for="needCoolingEquipmentYes" class="flex self-center">Yes</label>
                        <input wire:model.debounce.1000ms="needCoolingEquipment" type="radio"
                            name="needCoolingEquipment" value="false"
                            class="mx-2 w-6 h-8 bg-red-400 text-white border-2 border-gray-400 rounded-md hover:bg-red-600 {{ $needCoolingEquipment === true ? 'bg-red-600' : 'bg-gray-600' }}"
                            checked>
                        <label for="needCoolingEquipmentNo" class="flex self-center">No</label>
                    </div>
                </div>
                <div class="flex flex-row w-full justify-between mb-0">
                    <h3>Need help with wrapping?</h3>
                    <div class="flex flex-row justify-around">
                        <input wire:model.debounce.1000ms="needHelpWrapping" type="radio" name="needHelpWrapping"
                            value="true"
                            class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                        <label for="needHelpWrappingYes" class="flex self-center">Yes</label>
                        <input wire:model.debounce.1000ms="needHelpWrapping" type="radio" name="needHelpWrapping"
                            value="false"
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
                    <div class="flex flex-row justify-around">
                        <input wire:model.debounce.1000ms="helpPickUp" type="radio" name="helpPickUp" value="true"
                            class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                        <label for="helpPickUpYes" class="flex self-center">Yes</label>
                        <input wire:model.debounce.1000ms="helpPickUp" type="radio" name="helpPickUp" value="false"
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
                    <div class="flex flex-row justify-around">
                        <input wire:model.debounce.1000ms="helpDelivery" type="radio" name="helpDelivery" value="true"
                            class="mx-2 w-6 h-8 border-2 border-gray-400 rounded-md hover:bg-gray-400 hover:text-white">
                        <label for="helpDeliveryYes" class="flex self-center">Yes</label>
                        <input wire:model.debounce.1000ms="helpDelivery" type="radio" name="helpDelivery" value="false"
                            class="mx-2 w-6 h-8 bg-red-400 text-white border-2 border-gray-400" checked>
                        <label for="helpDeliveryNo" class="flex self-center">No</label>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="modalToggleEdit">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        <x-jet-danger-button wire:click="publishTask" class="ml-2">
            {{ __('Save') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
