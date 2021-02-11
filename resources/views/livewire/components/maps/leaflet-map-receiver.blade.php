<div>
    {{-- used "wire:ignore" to prevent DOM refresh when input value changed --}}
    <div wire:ignore id="leafletMapReceiver" class="flex w-full h-full py-72 mb-10"></div>
    <script>
        // Take a User's geo location.
        if(!navigator.geolocation) {
            status.textContent = 'Geolocation is not supported by your browser';
        } else {
            document.getElementById('status').textContent = 'Locating…';
            navigator.geolocation.getCurrentPosition(success, error);
        }



        // When failed to get geolocation.
        function error() {
        status.textContent = 'Unable to retrieve your location';
        }



        // This is a function to bind with Livewire's Model when the user clicked the map and selected it.
        function injectValue(latlng) {
            var element1 = document.getElementById('address');
            var element2 = document.getElementById('lat');
            var element3 = document.getElementById('lng');
            var element4 = document.getElementById('simpleToAddress');
            // input event fire to bind with Livewire Model.
                element1.dispatchEvent(new Event('input'));
                element2.dispatchEvent(new Event('input'));
                element3.dispatchEvent(new Event('input'));
                element4.dispatchEvent(new Event('input'));
        };



        // If success to get location then draw the Leaflet map with the tile and search controller.
        function success(position) {
            const latitude  = position.coords.latitude;
            const longitude = position.coords.longitude;
            const status = document.querySelector('#status');
            status.textContent = '';

            var tileLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                 { attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                     });

            var map = new L.map('leafletMapReceiver', {
                'center' : [latitude, longitude],
                'zoom' : 5,
                'layers' : [tileLayer],
                'zoomControl': false,
            });

            tileLayer.addTo(map);

            var searchControl = L.esri.Geocoding.geosearch({
                position: 'topleft',
                placeholder: 'Søke her',
                expanded: true,
            }).addTo(map);


            var results = L.layerGroup().addTo(map);

            searchControl.on('results', function (data) {
                // results.clearLayers();
                for (var i = data.results.length - 1; i >= 0; i--) {
                    var result = data.results[i];
                    document.getElementById('address').value= result.properties.Place_addr;
                    console.log(result);
                }
            });

            //Esri geocodeservice
            var geocodeService = L.esri.Geocoding.geocodeService();

            // define old marker array
            var marker = null;

            // click event define
            map.on('click', function(e) {
            // callback is called with error, result, and raw response
            // result.latlng contains the coordinates of the located address
            // result.address contains information about the match
                geocodeService.reverse().latlng(e.latlng).run(function(error, result) {
                    if (marker !== null) {
                        map.removeLayer(marker);
                    }
                    marker = L.marker(result.latlng, {autoPan:true}).addTo(map).bindPopup(result.address.Match_addr).openPopup();

                    document.getElementById('address').value = result.address.Match_addr;
                    document.getElementById('lat').value = result.latlng.lat;
                    document.getElementById('lng').value = result.latlng.lng;
                    var simpleToAddress = result.address.Postal + ', ' + result.address.City;
                    document.getElementById('simpleToAddress').value = simpleToAddress;

                    // Input event fire
                    injectValue(result.latlng);
                });

            });
        }
    </script>
</div>
