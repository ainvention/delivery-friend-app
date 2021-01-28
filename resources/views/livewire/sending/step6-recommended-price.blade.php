<div class="flex flex-col mx-40 text-left">
    <div class="flex mt-20 text-4xl justify-center">
        <div>Our recommended price</div>
    </div>

    <div class="flex flex-col lg:flex-row border-gray-300 border-2">
        <div class="flex-1 text-4xl text-left text-black font-extrabold">
            <span class="flex-auto pl-3 text-gray-300 self-center">@icon('credit-card')</span>
            {{-- <input wire:model.ignore="options.recommendedCosts" type="text" value="options.recommendedCosts"
                class="flex-1 outline-none" />NOK --}}
            <x-jet-input wire:model.ignore="options.recommendedCosts" id="recommendedCosts"
                class="flex-1 w-32 text-4xl font-bold outline-none border-transparent" type="text"
                name="recommendedCosts" value="options.recommendedCosts" required autofocus />
            <span class="flex-1 pl-3">NOK</span>
        </div>
        <x-jet-button wire:click="$emitUp('reCalcualteRecommendedCostsWithMenual')"
            class="flex flex-shrink m-2 md:text-xl text-cool-gray-50 bg-blue-600 font-extrabold">
            Calculate
        </x-jet-button>
    </div>
    <x-jet-input-error for="options.recommendedCosts" class="mt-2" />
    <div class="flex-1 flex-col text-gray-400 text-lg border-gray-300 border-2 border-t-0">
        <div class="flex flex-1 flex-col sm:flex-row justify-between mx-6 mt-6 mb-0">
            <h3 class="flex">Bringer's reward(Inclusive of VAT if application)</h3>
            <h3 class="flex font-extrabold">
                {{ $options['rewards'] }}
                <span class="flex ml-1">NOK</span>
            </h3>
        </div>
        <div class="flex flex-1 flex-col sm:flex-row justify-between mx-6 my-2 mb-0">
            <h3>Service fee, Delivery Friends(Includes VAT)</h3>
            <h3 class="font-extrabold">
                {{ $options['serviceCharges'] }}
                <span class="ml-1">NOK</span>
            </h3>
        </div>
        <div class="flex flex-1 flex-col sm:flex-row justify-between mx-6 my-2 mb-6">
            <h3 class="flex flex-col sm:flex-row">
                Included insurance
                <span class="">@icon('question-circle')</span>
                <a href="{{ url('https://www.tryg.no') }}" target="_blank"><img
                        src="{{ asset('images/steps/trygg-logo.png') }}" class="w-14 h-6" alt=""></a>
            </h3>
            <h3 class="font-extrabold">{{ $options['insuranceCost'] }}<span class="ml-1">NOK</span></h3>
        </div>
    </div>
    <div class="flex flex-col sm:flex-row h-auto mt-10 text-left bg-gray-200">
        <div class="flex w-1/6 mx-6 my-4">
            <img class="flex w-20" src="{{ asset('images/steps/shield.svg') }}" alt="">
        </div>
        <div class="flex w-5/6 mx-6 my-2 text-lg text-gray-500 self-center">
            Your item is insured up to NOK 10,000 in Norway through Tryg Forsikring. You
            can rest assured that your
            item is in good hands.
        </div>
    </div>
    <div class="flex flex-col sm:flex-row justify-between text-xl my-10">
        <button wire:click="$emitUp('moveBack')" class="text-gray-400 p-4">
            <span>@icon('chevron-left')</span>
            Back
        </button>
        <button wire:click="emitUp('saveSendingRequest')"
            class="bg-green-400 text-green-50 rounded-xl font-extrabold p-4">Request
            delivery</button>
    </div>
</div>
<script>
    var element1 = @this.options.fromLat;
    var element2 = @this.options.fromLng;
    var element3 = @this.options.toLat;
    var element4 = @this.options.toLng;



    var mapBoxApiKey= 'pk.eyJ1IjoiYWxleGludmVudGlvbiIsImEiOiJjanlkajl1YXowcnJyM2NvMTNkdmY2ODdhIn0.NbT6D1tbexgesO0kSHk77Q';
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
    // pass a parameter(options.totalDistance) by Event emit
    async function run() {
        const data = await getData();
        console.log(data);
        var dist = data.data.routes[0].distance;
        var distance = Math.round(Math.round(dist)/1000);
        window.livewire.emit('passTotalDistance', distance);
        window.livewire.emit('calculateRecommendedCosts', distance);
    }
    //main trigger
    run();
</script>
