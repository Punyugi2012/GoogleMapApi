<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map;
      function initMap() {
        var myPosition = {lat: 13.2860, lng: 100.9254}
        map = new google.maps.Map(document.getElementById('map'), {
          center: myPosition,
          zoom: 10,
        });
        var marker = new google.maps.Marker({
          position: myPosition,
          map: map,
        });
        var info = new google.maps.InfoWindow({
          content: '<div style="font-size:20px;color:red">Hello MotherFucker</div>'
        });
        google.maps.event.addListener(marker, 'click', function() {
          info.open(map, marker);
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfpagu7GeEUlgJYYahci7KGECxZf3Zs0k&callback=initMap"
    async defer></script>
  </body>
</html>