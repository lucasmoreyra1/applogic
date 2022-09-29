<?php
    require 'partials/partial.php';
    $array = $_SESSION['data'];
?>



<script>
    function initMap() {
  const directionsService = new google.maps.DirectionsService();
  const directionsRenderer = new google.maps.DirectionsRenderer(/*{draggable: true}*/);
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 5,
    center: { lat: -33.3504261, lng: -60.2908364 },
  });

  directionsRenderer.setMap(map);
  document.getElementById("submit").addEventListener("click", () => {
    calculateAndDisplayRoute(directionsService, directionsRenderer);
  });
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
      origin: "falcon 710 san nicolas argentina",
      destination: "falcon 710 san nicolas argentina",
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
          "<b>Route Segment: " + routeSegment + "</b><br>";
        summaryPanel.innerHTML += route.legs[i].start_address + " to ";
        summaryPanel.innerHTML += route.legs[i].end_address + "<br>";
        summaryPanel.innerHTML += route.legs[i].distance.text + "<br><br>";
      }
    })
    .catch((e) => window.alert("Directions request failed due to " + status));
}

window.initMap = initMap;
</script>