<div class="w-full">
    {{-- used "wire:ignore" to prevent DOM refresh when input value changed --}}
    <div wire:ignore id="leafletMap" class="flex w-full h-96 mb-10">
    </div>
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
            var element = document.getElementById('fromAddress');
            //input event fire to bind with Livewire Model.
                element.dispatchEvent(new Event('input'));
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

            var map = new L.map('leafletMap', {
                'center' : [latitude, longitude],
                'zoom' : 13,
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
                    document.getElementById('fromAddress').value= result.properties.Place_addr;
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

                    document.getElementById('fromAddress').value = result.address.Match_addr;

                    //test-code
                    console.log(result.address.Match_addr);

                    // Input event fire
                    injectValue(result.latlng);
                });

            });
        }
    </script>
</div>
