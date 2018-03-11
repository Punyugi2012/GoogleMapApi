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
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 30%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto', 'sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>

      <div id="floating-panel">
        <input type="text" id="address" value="กรุงเทพมหานคร">
        <input type="button" id="submit" value="ค้นหาข้อมูล">
      </div>
      <div id="map"></div>

    <script>
      function initMap() {
        var map;
        var position = {lat:13.847860, lng:100.604274};
        map = new google.maps.Map(document.getElementById('map'), {
          center: position,
          zoom: 10,
          mapTypeId: google.maps.MapTypeId.TERRAIN
        });

        var geocoder = new google.maps.Geocoder();
        document.getElementById('submit').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        });
      }
      function geocodeAddress(geocoder, map) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address':address}, function(results, status) {
          if(status == 'OK') {
            console.log(results[0].geometry.location);
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location
            });
          }
          else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfpagu7GeEUlgJYYahci7KGECxZf3Zs0k&callback=initMap"
    async defer></script>

  </body>
</html>