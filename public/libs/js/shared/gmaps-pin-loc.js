let map, activeInfoWindow, markers = [];

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: {
            lat: 14.559458395782759,
            lng: 121.07357345174765,
        },
        zoom: 8
    });

    map.addListener("click", function (event) {
        mapClicked(event);
    });

}

function mapClicked(event) {
    console.log(event);
    console.log(event.latLng.lat(), event.latLng.lng());

    hideMarkers(markers)
    const marker = new google.maps.Marker({
        position: event.latLng,
        label: "Dealer Location",
        draggable: true,
        map
    });
    markers.push(marker);

    $('input[name="lat"]').val(event.latLng.lat())
    $('input[name="long"]').val(event.latLng.lng())

    const geocoder = new google.maps.Geocoder();
    const latlng = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
    const request = {
        latLng: latlng
    }
    geocoder.geocode(request, results => {
        if (results.length) {
            console.log(results[0].formatted_address)

            $('input[name="address"]').val(results[0].formatted_address)
        }
    });
}

function markerClicked(marker, index) {
    console.log(map);
    console.log(marker.position.lat());
    console.log(marker.position.lng());
}

function markerDragEnd(event, index) {
    console.log(map);
    console.log(event.latLng.lat());
    console.log(event.latLng.lng());
}

function hideMarkers(markers) {
    for (let i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }
}

function pinLocation(lat, lng, label = '') {
    let latlong = { lat: parseFloat(lat), lng: parseFloat(lng) };

    const marker = new google.maps.Marker({
        position: latlong,
        label: label,
        draggable: true,
        map
    });
    markers.push(marker);
}