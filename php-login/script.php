<?php
    require 'partials/partial.php';
    $array = $_SESSION['data'];
    $start = $_SESSION['startEnd'];

?>




<script>
    var map;
    function initMap() {
  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer(/*{draggable: true}*/);
   map = new google.maps.Map(document.getElementById("map"), {
    zoom: 5,
    center: { lat: -33.3504261, lng: -60.2908364 },
  });



  directionsRenderer.setMap(map);
  document.getElementById("submit").addEventListener("click", () => {
    calculateAndDisplayRoute(directionsService, directionsRenderer);
  });

  //

}

function calculateAndDisplayRoute(directionsService, directionsRenderer) {
  const waypts = [];
  var pase = <?php echo json_encode($array);?>;
  const longArray = pase.length;

  for (let i = 0; i < longArray; i++) {

      waypts.push({
        location: pase[i],
        stopover: true,
      });

  }

  directionsService
    .route({
      origin: '<?php echo $start; ?>',
      destination: '<?php echo $start; ?>',
      waypoints: waypts,
      optimizeWaypoints: true,
      travelMode: google.maps.TravelMode.DRIVING,
    })
    .then((response) => {
      directionsRenderer.setDirections(response);

      const route = response.routes[0];
      const summaryPanel = document.getElementById("directions-panel");

      summaryPanel.innerHTML = "";

      // For each route, display summary information.
      for (let i = 0; i < route.legs.length; i++) {
        const routeSegment = i + 1;

        summaryPanel.innerHTML +=
          "<b>Ruta Número: " + routeSegment + "</b><br>";
        summaryPanel.innerHTML += route.legs[i].start_address.substr(0,30) + "..." + " <strong>Hacia </strong> ";
        summaryPanel.innerHTML += route.legs[i].end_address.substr(0,33) + "..." + "<br>";
        summaryPanel.innerHTML += route.legs[i].distance.text + "<br><br>";
      }
    })
    .catch((e) => window.alert("Directions request failed due to " + status));
}

window.initMap = initMap;


</script>

<script>

  var searchInput = 'search_input';

  const center = { lat: -33.3334669, lng: -60.2110494 };
  const defaultBounds = {
      north: center.lat + 0.2,
      south: center.lat - 0.2,
      east: center.lng + 0.2,
      west: center.lng - 0.2,
    };

    const options = {
      bounds: defaultBounds,
      strictBounds: false,
    };

    var latitude;
    var longitude;

  $(document).ready(function () {
      var autocomplete;
      autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), options);


      google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var places = autocomplete.getPlace();

        latitude = places.geometry.location.lat();
        longitude = places.geometry.location.lng();

        var marker = new google.maps.Marker({
          position: {lat: latitude, lng: longitude},
          map: map,
          title: ''
        });

        map.setZoom(14);
        map.setCenter({lat: latitude, lng: longitude});


    });

  });
</script>