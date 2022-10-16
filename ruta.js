if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(function(position){
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        var mymap = L.map('mapa', {
            center: [latitude, longitude],
            zoom: 12
        });

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 25,
            attribution: 'Datos del mapa de &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' + '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imágenes © <a href="https://www.mapbox.com/">Mapbox</a>', 
            id: 'mapbox/streets-v11'
        }).addTo(mymap);

        L.Routing.control({
            waypoints: [
                L.latLng(latitude, longitude),
                L.latLng(-33.3343012, -60.2248306),
            ],
            language: 'es'
        }).addTo(mymap);
    });
}
navigator.geolocation.getCurrentPosition(function(position){
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
});
var mymap = L.map('mapa', {
    center: [latitude, longitude],
    zoom: 12
});
L.Routing.control({
    waypoints: [
        L.latLng(latitude, longitude), //dirección obtenida del usuario
        L.latLng(-33.3343012, -60.2248306) //dirección fija de destino
    ],
    language: 'es'
}).addTo(mymap);
