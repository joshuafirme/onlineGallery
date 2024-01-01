let map, activeInfoWindow, markers = [];

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: {
            lat: 15.315993552629273,
            lng: 121.68546703671875,
        },
        zoom: 9
    });

    map.addListener("click", function(event) {
        mapClicked(event);
    });

    initMarkers();
}

function initMarkers() {
    let initialMarkers = $('#markers').val();

    if (initialMarkers) {
        initialMarkers = JSON.parse(initialMarkers);
    }
    console.log(initialMarkers)
    for (let index = 0; index < initialMarkers.length; index++) {

        const markerData = initialMarkers[index];
        const marker = new google.maps.Marker({
            position: markerData.position,
            label: markerData.label,
            draggable: markerData.draggable,
            icon: {
                url: "/img/marker.png",
                origin: {x: 0, y: 0}
          },    
            map
        });
        markers.push(marker);

        let content = `<b>${markerData.name}</b><br>`
        content += `${markerData.position.lat}, ${markerData.position.lng}`;

        const infowindow = new google.maps.InfoWindow({
            content: content,
        });
        marker.addListener("click", (event) => {
            if (activeInfoWindow) {
                activeInfoWindow.close();
            }
            infowindow.open({
                anchor: marker,
                shouldFocus: false,
                map
            });
            activeInfoWindow = infowindow;
            markerClicked(marker, index);
        });

        marker.addListener("dragend", (event) => {
            markerDragEnd(event, index);
        });
    }
}

function mapClicked(event) {
    console.log(map);
    console.log(event.latLng.lat(), event.latLng.lng());
}

function markerClicked(marker, index) {
    console.log(map);
    console.log(marker.position.lat());
    console.log(marker.position.lng());
}