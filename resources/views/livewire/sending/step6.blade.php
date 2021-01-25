<div class="w-1/2 h-auto">
    {{-- <input value={{ "" }} disabled> --}}
    <input type="hidden" id="fromLat" value={{ $options['fromLat'] }}>
    <input type="hidden" id="fromLng" value={{ $options['fromLng'] }}>
    <input type="hidden" id="toLat" value={{ $options['toLat'] }}>
    <input type="hidden" id="toLng" value={{ $options['toLng'] }}>
    <label for="totalDist">Total Distance</label>
    <input wire:model="options.totalDistance" id="totalDist" type="text">{{ $options['totalDistance'] }}km

</div>

<script>
    var element1 = document.getElementById('fromLat').value;
var element2 = document.getElementById('fromLng').value;
var element3 = document.getElementById('toLat').value;
var element4 = document.getElementById('toLng').value;
var mapBoxApiKey= 'pk.eyJ1IjoiYWxleGludmVudGlvbiIsImEiOiJjanlkajl1YXowcnJyM2NvMTNkdmY2ODdhIn0.NbT6D1tbexgesO0kSHk77Q';
var url = 'https://api.mapbox.com/directions/v5/mapbox/driving/';

function getData() {
    console.log('logging');
    const test = axios.get(`${url}${element2},${element1};${element4},${element3}?access_token=${mapBoxApiKey}`);
    return test;
}


var element5 = document.getElementById('totalDist');

function injectValue(latlng) {
    // input event fire to bind with Livewire Model.
    element5.dispatchEvent(new Event('input'));
};



async function run() {
    const data = await getData();
    // console.log(data);
    var dist = data.data.routes[0].distance;
    document.getElementById('totalDist').value = Math.floor(Math.round(dist)/1000);
    injectValue();
}

run();

</script>
</div>
