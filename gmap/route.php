<script>

    waypts_mtlsheloc.push({
        location: new google.maps.LatLng(45.658197,-73.636333),
        stopover: true
    })

    function initMap() {
        var directionsService = new google.maps.DirectionsService();
        var directionsDisplay = new google.maps.DirectionsRenderer();

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: {lat: 23.79795, lng: 90.405943}
        });
        directionsDisplay.setMap(map);
        calculateAndDisplayRoute(directionsService, directionsDisplay)
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var waypts = [];
        var checkboxArray = document.getElementById('waypoints');
        for (var i = 0; i < checkboxArray.length; i++) {
            if (checkboxArray.options[i].selected) {
                waypts.push({
                    location: checkboxArray[i].value,
                    stopover: true
                });
            }
        }

        directionsService.route({
            origin: document.getElementById('start').value,
            destination: document.getElementById('end').value,
            waypoints: waypts,
            optimizeWaypoints: true,
            travelMode: 'DRIVING'
        }, function(response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }




</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87_08fCDAVXll4Vn2YHFIFEfnbV3O-Jk&callback=initMap">
</script>

<style>
    #map {
        width: 100%;
        height: 700px;
    }
</style>

<div id="map"></div>