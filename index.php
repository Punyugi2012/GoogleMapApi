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
      var maps;
      function initMap() {
        var beaches = [
          ['Bondi Beach', -33.890542, 151.274856],
          ['Coogee Beach', -33.923036, 151.259052],
          ['Cronulla Beach', -34.028249, 151.157507],
          ['Manly Beach', -33.80010128657071, 151.28747820854187],
          ['Maroubra Beach', -33.950198, 151.259302]
        ];
        map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(beaches[0][1], beaches[0][2]),
          zoom: 10,
          mapTypeId: google.maps.MapTypeId.TERRAIN
        });

        var marker, info;
        var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';

        for(var i = 0; i < beaches.length; i++) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(beaches[i][1], beaches[i][2]),
            map: map,
            icon: image
          });
          info = new google.maps.InfoWindow();
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              info.setContent(beaches[i][0]);
              info.open(map, marker)
            }
          })(marker, i));
        }
        
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfpagu7GeEUlgJYYahci7KGECxZf3Zs0k&callback=initMap"
    async defer></script>
  </body>
</html>