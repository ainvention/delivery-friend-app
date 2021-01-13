<div class="w-full">
    {{-- used "wire:ignore" to prevent DOM refresh when input value changed --}}
    <div wire:ignore id="leafletMap" class="flex w-full h-96 mb-10">
    </div>
    <script>
        function success(position) {
    const latitude  = position.coords.latitude;
    const longitude = position.coords.longitude;
    const status = document.querySelector('#status');
    status.textContent = '';

    var tileLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
         { attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
             });

     var map = new L.map('leafletMap', {
           'center' : [latitude, longitude],
           'zoom' : 13,
           'layers' : [tileLayer],
           'zoomControl': false,
       })

     tileLayer.addTo(map)

     var searchControl = L.esri.Geocoding.geosearch({
         position: 'topleft',
         placeholder: 'Søke her',
         expanded: true,
     }).addTo(map);


     var results = L.layerGroup().addTo(map);

     function injectValue(latlng) {
         var element = document.getElementById('fromAddress');
             element.dispatchEvent(new Event('input'));
     };

     searchControl.on('results', function (data) {
         // results.clearLayers();
         for (var i = data.results.length - 1; i >= 0; i--) {
             var result = data.results[i];
             document.getElementById('fromAddress').value= result.properties.Place_addr;
         }
     });

     var geocodeService = L.esri.Geocoding.geocodeService();
     var marker = null;
     map.on('click', function(e) {
         // callback is called with error, result, and raw response
         // result.latlng contains the coordinates of the located address
         // result.address contains information about the match
         geocodeService.reverse().latlng(e.latlng).run(function(error, result) {
             if (marker !== null) {
                 map.removeLayer(marker);
             }

             marker = L.marker(result.latlng, {autoPan:true}).addTo(map).bindPopup(result.address.Match_addr).openPopup();


             document.getElementById('fromAddress').value = result.address.Match_addr;
             console.log(result.address.Match_addr);
                 injectValue(result.latlng);
         });

     });
    }

    function error() {
    status.textContent = 'Unable to retrieve your location';
    }

    if(!navigator.geolocation) {
    status.textContent = 'Geolocation is not supported by your browser';
    } else {
    document.getElementById('status').textContent = 'Locating…';
    navigator.geolocation.getCurrentPosition(success, error);
    }
    </script>
</div>
