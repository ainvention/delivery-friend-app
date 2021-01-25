<div class="w-1/2 h-auto">
    <h1 for="totalDist">Total Distance</h1>
    <h3>{{ $options['totalDistance'] }}km</h3>

    <script>
        var element1 = @this.options.fromLat;
    var element2 = @this.options.fromLng;
    var element3 = @this.options.toLat;
    var element4 = @this.options.toLng;
    var element5 = document.getElementById('totalDist');


    var mapBoxApiKey= 'pk.eyJ1IjoiYWxleGludmVudGlvbiIsImEiOiJjanlkajl1YXowcnJyM2NvMTNkdmY2ODdhIn0.NbT6D1tbexgesO0kSHk77Q';
    var url = 'https://api.mapbox.com/directions/v5/mapbox/driving/';



    // access Mapbox API to get Navigation data
    // https://docs.mapbox.com/api/navigation/directions/
    function getData() {
        console.log('logging');

        const routeData = axios.get(`${url}${element2},${element1};${element4},${element3}?access_token=${mapBoxApiKey}`);
        return routeData;
    }


    // input event fire to bind with Livewire Model.
    function injectValue(latlng) {
        element5.dispatchEvent(new Event('input'));
    };


    // Main function to change Promised data status to fullfilled and pass a parameter.
    async function run() {
        const data = await getData();
        console.log(data);
        var dist = data.data.routes[0].distance;
        var distance = Math.round(Math.round(dist)/1000);
        window.livewire.emit('passTotalDistance', distance);
        // injectValue();
    }

    //main trigger
    run();
    </script>
</div>
