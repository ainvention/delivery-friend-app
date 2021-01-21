<div>
    <div id="map" class="map"></div>

    <input value={{ "" }} disabled>
</div>
<script>
    var map = L.map('map');

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

L.Routing.control({
    waypoints: [
        L.latLng(57.74, 11.94),
        L.latLng(59.4108, 10.47)
    ],
    routeWhileDragging: true
}).addTo(map);
</script>
</div>
