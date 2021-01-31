<div class="w-full h-auto text-left">
    <div class="mt-10 text-center xl:mx-60">
        <h1 class="text-4xl">Your task has been posted!!</h1>
        <h2 class="text-2xl py-6 text-gray-400">
            We have already sent your task out to relevant bringers, and those interested will get back to you with
            questions or a date they can help you out.</h2>
    </div>
    <div class="flex flex-col mx-10 text-left border-gray-200 border-2 xl:mx-60">
        <div class="flex flex-col lg:flex-row">
            <div class="lg:w-full h-auto p-5">
                <h1 class="text-4xl uppercase">{{ $title }}</h1>
                <h3 class="text-xl text-gray-400"> from : {{ $fromAddress }}</h3>
                <h3 class="text-xl text-gray-400">to : {{ $toAddress }}</h3>
            </div>
            <div class="lg:w-1/2 m-5 align-middle">
                @isset($photo)
                <img src="{{ asset('storage/'.$photo)}}" alt="Your sending item photo" class="">
                @endisset
            </div>
        </div>
        @if(!$isCoupon)
        <div class="flex flex-row">
            <div class="flex w-1/2 h-auto p-5 text-xl text-gray-400">
                <h2>Do you have a coupon code?</h2>
            </div>
            <div class="flex p-5 justify-between">
                <x-jet-secondary-button wire:click="" class="mx-1">
                    {{ __('No') }}
                </x-jet-secondary-button>
                <x-jet-secondary-button wire:click="" class="mx-1">
                    {{ __('Yes') }}
                </x-jet-secondary-button>
            </div>
        </div>
        @else
        <div class="flex flex-col px-5 text-lg text-gray-400">
            <div class="flex flex-col md:flex-row w-full justify-between">
                <h3 class="text-lg text-gray-400">Bringer's reward</h3>
                <h3 class="">{{ $rewards }}NOK</h3>
            </div>
            <div class="flex flex-col md:flex-row w-full justify-between">
                <h3 class="">Service fee, Delivery Friends</h3>
                <h3>{{ $serviceCharges }}NOK</h3>
            </div>
            <div class="flex flex-col md:flex-row w-full justify-between">
                <h3>Insurance costs</h3>
                <h3>{{ $insuranceCost }} NOK</h3>
            </div>
            <div class="flex flex-col md:flex-row w-full text-2xl text-blue-800 justify-between">
                <h3>Total delivery costs</h3>
                <h3>{{ $totalDeliveryCosts }} NOK</h3>
            </div>
        </div>
        @endif
        <div class="flex justify-end mr-5 my-10">
            <x-jet-secondary-button wire:click="" class="bg-green-400 text-green-50 justify-center">
                {{ __('Continue to your task  >') }}
            </x-jet-secondary-button>
        </div>
    </div>


    <div class="flex flex-col mx-28">
        <h1 class="text-2xl my-10">
            How do I pay for the delivery?
        </h1>
        <h3 class="text-lg text-gray-500">
            The first time you accept an offer, you will be asked to enter your card details for payment. When ypu
            accept an offer for a delivery request, the amount will be reserved in your account, The amount will not be
            deducted from your account until you have confirmed that the delivery has been completed. Upon receipt of
            your confirmation, we will charge ypur card for the agreed amount and transfer the payment to the bringer.
            If you want to save some time, you can add your card information now. We can rest assured that your card
            information is stored securely at Stripe-one of the world's leading payment provider.
        </h3>
        <h1 class="text-2xl my-10">
            Is my item insured?
        </h1>
        <h3 class="text-lg text-gray-500">
            Yes, every task is actually insured for up to 4,000NOK. To be eligible for the insurance, make sure the
            bringer you agree with actually sends you an offer to help, and that it is fully accepted and delivered
            through the system.
        </h3>
        <h3 class="my-10 text-base text-gray-500">
            Anything you need to change about your task?
        </h3>
        <div class="flex flex-row">
            <x-jet-secondary-button wire:click="moveNext" class="mx-1">
                {{ __('Edit your task info') }}
            </x-jet-secondary-button>
            <h3 class="mx-5 text-base text-gray-500 self-center">
                OR
            </h3>

            <x-jet-secondary-button wire:click="" class="mx-1">
                {{ __('Delete your task') }}
            </x-jet-secondary-button>
        </div>
    </div>
</div>
<x-jet-secondary-button wire:click='$refresh' class="mx-1">
    {{ __('Refresh This page') }}
</x-jet-secondary-button>

</div>
