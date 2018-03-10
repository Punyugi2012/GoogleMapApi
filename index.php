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
        var beaches = [
          {'location':'Bondi Beach', 'lat':-33.890542, 'lng':151.274856},
          {'location':'Coogee Beach', 'lat':-33.923036, 'lng':151.259052},
          {'location':'Cronulla Beach', 'lat':-34.028249, 'lng':151.157507},
          {'location':'Manly Beach', 'lat':-33.80010128657071, 'lng':151.28747820854187},
          {'location':'Maroubra Beach', 'lat':-33.950198, 'lng':151.259302}
        ];
        map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(beaches[0].lat, beaches[0].lng),
          zoom: 10,
          mapTypeId: google.maps.MapTypeId.TERRAIN
        });

        var marker, info, image;
        image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';

        beaches.forEach(function(beach, index) {
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(beach.lat, beach.lng),
            map: map,
            icon: image
          });

          info = new google.maps.InfoWindow();
          google.maps.event.addListener(marker, 'click', (function(marker, beach) {
            return function() {
              info.setContent(beach.location);
              info.open(map, marker)
            }
          })(marker, beach));
        })
      
        
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfpagu7GeEUlgJYYahci7KGECxZf3Zs0k&callback=initMap"
    async defer></script>
  </body>
</html>