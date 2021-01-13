<div>
    <!-- component -->
    <div class="text-center mt-24">
        <div class="flex items-center justify-center">
            <h2 class="text-4xl tracking-tight">
                And where should it be delivered to?
            </h2>
        </div>
    </div>

    <div class="flex justify-center my-2 mx-4 md:mx-0">
        <div class="w-full max-w-xl bg-white rounded-lg shadow-md p-6">{{-- form --}}
            <div class="flex flex-wrap mx-3 mb-6">
                <div class="flex flex-col w-full px-3 mb-6">
                    <div id="leafletMap4" class="flex w-full h-96 mb-10">map here!!
                    </div>
                    <div class="flex justify-between w-full md:w-full px-3 my-2">
                        <button wire:click="$emitUp('moveBack')"
                            class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500">Back</button>
                        <button wire:click="$emitUp('moveNext')"
                            class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500{{ $step1 === null ? 'disabled:opacity-50' : '' }}"
                            {{$step1 === null ? "disabled" : ""  }}>Next</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const mymap4 = new L.map('leafletMap4').setView([51.505, -0.09], 13);
            const tiles = new L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 13,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoiYWxleGludmVudGlvbiIsImEiOiJjanlkajl1YXowcnJyM2NvMTNkdmY2ODdhIn0.NbT6D1tbexgesO0kSHk77Q'
            }).addTo(mymap4);
        </script>
    </div>
</div>
