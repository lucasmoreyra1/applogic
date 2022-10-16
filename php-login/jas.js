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

  });

});
