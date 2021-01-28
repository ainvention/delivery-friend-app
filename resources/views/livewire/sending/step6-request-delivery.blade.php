<div class="w-full h-auto text-left">
    <div class="mt-10 text-center md:mx-60">
        <h1 class="text-4xl">Your task has been posted!!</h1>
        <h2 class="text-2xl py-6 text-gray-400">
            We have already sent your task out to relevant bringers, and those interested will get back to you with
            questions or a date they can help you out.</h2>
    </div>
    <div class="flex flex-col mx-10 text-left border-gray-200 border-2 md:mx-60">
        <div class="flex flex-row">
            <div class="w-3/4 h-auto p-5">
                <h1 class="text-4xl">{{ $options['title'] }}</h1>
                <h3 class="text-xl text-gray-400"> from : {{ $options['fromAddress'] }}</h3>
                <h3 class="text-xl text-gray-400">to : {{ $options['toAddress'] }}</h3>
            </div>
            <div class="w-1/4 h-auto m-5 p-5 bg-gray-200 align-middle">
                <img class="w-full h-auto" src="{{ asset('storage/'.$options['photo'])}}" alt="sending photo">
            </div>
        </div>
        @if(!$options['isCoupon'])
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
        <div class="flex flex-col px-5">
            <div class="flex w-full  justify-between">
                <h3 class="text-lg text-gray-400">Bringer's reward</h3>
                <h3 class="">{{ $options['reward'] }}NOK</h3>
            </div>
            <div class="flex w-full justify-between">
                <h3 class="text-lg text-gray-400">Service fee, Delivery Friends</h3>
                <h3>{{ $options['serviceCharge'] }}NOK</h3>
            </div>
            <div class="flex w-full text-gray-800 justify-between">
                <h3>Total delivery costs</h3>
                <h3>{{ $options['totalDeliveryCosts'] }} NOK</h3>
            </div>

        </div>
        @endif
    </div>
    <div class="flex justify-end mr-60 my-10">
        <x-jet-secondary-button wire:click="" class="w-1/4 h-16 bg-green-400 text-green-50">
            {{ __('Continue to your task  >') }}
        </x-jet-secondary-button>
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
            <x-jet-secondary-button wire:click="" class="mx-1">
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
