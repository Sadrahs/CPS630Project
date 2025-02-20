let map;
let directionsService;
let directionsRenderer;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 5,
        center: { lat: 43.6532, lng: -79.3832 } // Default to Toronto
    });

    directionsService = new google.maps.DirectionsService();
    directionsRenderer = new google.maps.DirectionsRenderer();
    directionsRenderer.setMap(map);
}

function showDeliveryRoute() {
    const location = document.getElementById("location").value;
    let destinationCoords;

    if (location === "Toronto") {
        destinationCoords = { lat: 43.6532, lng: -79.3832 };
    } else if (location === "Vancouver") {
        destinationCoords = { lat: 49.2827, lng: -123.1207 };
    } else if (location === "Montreal") {
        destinationCoords = { lat: 45.5017, lng: -73.5673 };
    }

    const request = {
        origin: { lat: 40.7128, lng: -74.0060 }, // Example: New York as the warehouse
        destination: destinationCoords,
        travelMode: 'DRIVING'
    };

    directionsService.route(request, function (response, status) {
        if (status === 'OK') {
            directionsRenderer.setDirections(response);
        } else {
            alert('Could not find a route to the selected location.');
        }
    });
}
