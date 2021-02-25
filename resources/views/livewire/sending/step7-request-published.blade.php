<div class="flex flex-col w-full my-4 text-left mb-auto">
    @include('livewire.sending.delete-task-confirmation')
    <div class="mt-10 text-center xl:mx-60">
        <h1 class="text-4xl font-extrabold">Your task has been posted!</h1>
        <h2 class="text-xl py-6 mx-4 text-gray-400">
            We have already sent your task out to relevant bringers, and those interested will get back to you with
            questions or a date they can help you out.</h2>
    </div>
    <div class="flex flex-col mx-10 text-left border-gray-200 border-2 xl:mx-40 mb-auto">
        <div class="flex flex-col lg:flex-row">
            <div class="lg:w-full p-5">
                <h1 class="text-3xl uppercase text-gray-500 font-semibold">{{ $title }}</h1>
                <h3 class="mt-4 text-xl text-gray-400"> <span class="uppercase font-bold">from</span> :
                    {{ $fromAddress }}</h3>
                <h3 class="mt-2 text-xl text-gray-400"> <span class="uppercase font-bold">to</span> :
                    {{ $toAddress }}
                </h3>
            </div>
            <div class="lg:w-1/2 p-5 align-middle">
                @isset($photo)
                <img src="{{ asset('/storage/sending-photos/'.$photo)}}" alt="Your sending item photo">
                @else
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
                @endisset
            </div>
        </div>
        <div class="flex flex-col m-5 {{ $couponAdjusted === true ? 'hidden' : ''}}"
            {{ $couponAdjusted === true ? 'disabled' : ''}}>
            <div class="flex text-xl text-gray-400">
                <h2>Do you have a coupon?</h2>
            </div>
            <div class="flex mt-2 justify-start">
                <x-jet-secondary-button wire:click="couponNotUse" class="mx-1">
                    {{ __('No') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button wire:click="modalToggleCoupon" class="mx-1">
                    {{ __('Yes') }}
                </x-jet-secondary-button>
            </div>
        </div>
        <x-jet-dialog-modal wire:model="modalSwitchCoupon">
            <x-slot name="title">
                Add Coupon
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="coupon" value="{{ __('Insert your coupon number.') }}" class="text-xl" />
                    <x-jet-input wire:model.defer="couponNumber" type="text" class="mt-1 block w-full" />
                    {{-- <span class="text-blue-400">Once a coupon is used, it cannot be converted to another task.</span> --}}
                    @error('couponNumber') <span>{{ $message }}</span> @enderror
                </div>
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

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="modalToggleCoupon">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="useCoupon">
                    {{ __('Save') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>



        @if($couponAdjusted === true )
        <div class="flex flex-col px-5 text-lg text-gray-400">
            <div class="flex flex-row w-full justify-between">
                <h3 class="text-lg text-gray-400">Bringer's reward</h3>
                <h3>{{ $reward }} NOK</h3>
            </div>
            <div class="flex flex-row w-full justify-between">
                <h3>Service fee, (to Delivery Friends)</h3>
                <h3>{{ $serviceCharge }} NOK</h3>
            </div>
            <div class="flex flex-row w-full justify-between">
                <h3>Insurance costs</h3>
                <h3>{{ $insuranceCost }} NOK</h3>
            </div>
            @if($couponPrice !== null || $couponRate !== null)
            <div class="flex flex-row w-full mt-4 pt-4 border-t-2 border-gray-300 justify-between">
                <div class="flex flex-col">
                    <h3>Coupon adjustment</h3>
                    @isset($couponRate)
                    <span>(not adjust to insurance)</span>
                    @endisset
                </div>
                @if($couponPrice !== null)
                <h3 class="text-red-400"> - {{ $couponPrice }} NOK</h3>
                @elseif($couponRate !== null)
                <h3 class="text-red-400"> - {{ $couponRate }} %</h3>
                <span class="text-red-400">({{ $discountedCost }} NOK)</span>
                @endif
            </div>
            @endisset
            <div
                class="flex flex-row w-full text-2xl mt-4 pt-4 border-t-2 border-gray-300 text-blue-800 justify-between">
                <h3>Total delivery cost</h3>
                <h3>{{ $totalDeliveryCost }} NOK</h3>
            </div>
        </div>
        @endif

        <div class="flex justify-end mx-5 my-5">
            <button wire:click="moveStep1"
                class="w-full sm:w-1/2 appearance-none bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:border-gray-500 {{ $couponAdjusted === true ? '' : 'disabled:opacity-50'}}"
                {{ $couponAdjusted === true ? '' : 'disabled'}}>
                {{ __('Continue to make new task  >') }}
            </button>
        </div>
    </div>

    <div class="flex flex-col mx-10 sm:mx-30 mb-auto">
        <h1 class="text-2xl my-10">
            How do I pay for the delivery?
        </h1>
        <h3 class="text-lg text-gray-500">
            The first time you accept an offer, you will be asked to enter your card details for payment. When you
            accept an offer for a delivery request, the amount will be reserved in your account, The amount will not
            be
            deducted from your account until you have confirmed that the delivery has been completed. Upon receipt
            of
            your confirmation, we will charge ypur card for the agreed amount and transfer the payment to the
            bringer.
            If you want to save some time, you can add your card information now. We can rest assured that your card
            information is stored securely at Stripe which is one of the world's leading payment provider".
        </h3>
        <h1 class="text-2xl my-10">
            Is my item insured?
        </h1>
        <h3 class="text-lg text-gray-500">
            Yes, every task is actually insured for up to 4,000NOK. To be eligible for the insurance, make sure the
            bringer you agree with actually sends you an offer to help, and that it is fully accepted and delivered
            through the system.
        </h3>

        <div class="flex flex-col md:flex-row my-10 text-gray-50">
            <h3 class="flex w-full md:w-1/2 text-base text-gray-500">
                Anything you need to change about your task?
            </h3>
            <div class="flex flex-col md:flex-row w-full md:w-1/2">
                <button wire:click="editTask"
                    class="w-full md:w-1/2 my-2 appearance-none font-bold border bg-green-500 text-white border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-green-200 hover:text-gray-600 focus:outline-none focus:border-gray-500">
                    Edit your task info
                </button>
                <h3 class="md:flex md:mx-5 hidden my-2 text-base text-gray-500 self-center">
                    OR
                </h3>
                <button wire:click="modalToggle"
                    class="w-full md:w-1/2 my-2 appearance-none bg-red-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-red-200 hover:text-gray-600 focus:outline-none focus:border-gray-500">
                    Delete your task
                </button>
            </div>
        </div>
    </div>
</div>
