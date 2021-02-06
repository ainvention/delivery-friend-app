<div class="flex flex-col justify-center my-20 mx-4 xl:mx-40 px-2 xl:px-20   bg-white rounded-lg shadow-md pt-0 p-6">
    @include('livewire.components.sessionMessage')
    <div
        class="flex flex-col mb-5 text-5xl text-left sm:text-center px-4 py-1 dark:text-white rounded-full leading-snug font-semibold tracking-wide text-gray-500">
        Our recommended price
        <span class="text-sm text-blue-600 text-left my-2 sm:text-center">or Enter and calculate the price you could
            pay
            to
            the
            helper</span>
    </div>

    <div class="flex flex-col lg:flex-row border-gray-300 border-2">
        <div class="flex-col sm:flex-row flex-1 text-4xl text-left text-black font-extrabold">
            <span class="flex-auto pl-3 text-gray-300 self-center">@icon('credit-card')</span>
            <x-jet-input wire:model.ignore="recommendedCost" id="recommendedCost"
                class="flex-1 w-32 text-4xl font-bold outline-none border-transparent" type="text"
                name="recommendedCost" required />
            <span class="flex-1 pl-3 ">NOK</span>
            {{-- @error('recommendedCosts') <span class="error text-sm pl-3 text-red-600">{{ $message }}</span>
            @enderror --}}
            <x-jet-input-error for="recommendedCost" class="ml-4" />
        </div>
        <x-jet-button wire:click="calcualteRecommendedCostManually"
            class="flex flex-shrink m-2 md:text-xl text-cool-gray-50 bg-green-600 font-extrabold justify-evenly">
            Calculate
        </x-jet-button>
    </div>
    <div class="flex-1 flex-col text-gray-400 text-lg border-gray-300 border-2 border-t-0">
        <div class="flex flex-1 flex-col sm:flex-row justify-between mx-6 mt-6 mb-0">
            <h3 class="">Delivery helper's reward(Includes VAT)</h3>
            <h3 class="flex font-extrabold">
                {{ $reward }}
                <span class="ml-1">NOK</span>
            </h3>
        </div>
        <div class="flex flex-1 flex-col sm:flex-row justify-between mx-6 my-2 mb-0">
            <h3>Service fee, (Delivery Friends, VAT inc.)</h3>
            <h3 class="flex font-extrabold">
                {{ $serviceCharge }}
                <span class="ml-1">NOK</span>
            </h3>
        </div>
        <div class="flex flex-1 flex-col sm:flex-row justify-between mx-6 my-2 mb-6">
            <h3 class="flex flex-col sm:flex-row">
                Included insurance
                <span class="">@icon('question-circle')</span>
            </h3>
            <h3 class="font-extrabold">{{ $insuranceCost }}<span class="ml-1">NOK</span></h3>
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
    <div class="flex flex-row mt-10 text-left bg-gray-200">
        <div class="sm:w-1/3 ml-3 my-2 self-center">
            <a href="{{ url('https://www.tryg.no') }}" target="_blank"><img
                    src="{{ asset('images/steps/trygg-logo.png') }}" class="p-2" alt="tryg insurance logo"></a>
        </div>
        <div class="sm:max-w-full mx-3 my-2 text-lg text-gray-500 self-center">
            Your item is insured up to 10,000 NOK in Norway through Tryg Forsikring. You can rest assured that your item
            is in good hands.
        </div>
    </div>
    <div class="flex flex-col sm:flex-row justify-between sm:space-x-20 text-xl my-10">
        <button wire:click="moveBack" class="sm:w-1/2 text-gray-400 p-4">
            <span>@icon('chevron-left')</span>
            Back
        </button>
        <button wire:click="moveStep7"
            class="sm:w-1/2 appearance-none bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:border-gray-500">Request
            delivery</button>
    </div>
    <script>
        var element1 = @this.fromLat;
        var element2 = @this.fromLng;
        var element3 = @this.toLat;
        var element4 = @this.toLng;

        var mapBoxApiKey= 'pk.eyJ1IjoiYWxleGludmVudGlvbiIsImEiOiJja2ttZXN0dHQzN29uMnVvY3U5am13ZGt6In0._f_4UOuTHo-35LfZOVEyxw';

        var url = 'https://api.mapbox.com/directions/v5/mapbox/driving/';



        // access Mapbox API to get Navigation data
        // https://docs.mapbox.com/api/navigation/directions/
            function getData() {
            console.log('logging');
            const routeData = axios.get(`${url}${element2},${element1};${element4},${element3}?access_token=${mapBoxApiKey}`);
            return routeData;
        }


        // Main function to change Promised data status to fullfilled.
        // get routes data
        // pass a parameter(totalDistance) by Event emit
        async function run() {
            const data = await getData();
            console.log(data);
            var dist = data.data.routes[0].distance;
            var distance = Math.round(Math.round(dist)/1000);
            window.livewire.emit('passTotalDistance', distance);
            window.livewire.emit('calculateRecommendedCost', distance);
        }

        //main trigger
        run();
    </script>
</div>
