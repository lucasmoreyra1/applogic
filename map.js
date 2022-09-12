let map = L.map('map').setView([-33.3494,-60.2277],13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap'
}).addTo(map);
L.marker([-33.3786098, -60.1787897]).addTo(map);
L.marker([-33.358718, -60.189326]).addTo(map);
