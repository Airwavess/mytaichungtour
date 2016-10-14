function Data() {
    $.ajax({
        url: "http://localhost/Tour/scripts/data.json",
        type: "GET",
        dataType: 'json',
        success: function(result) {
            setData(result);
            renderLine();
        },
        error: function() {
            console.log("Error");
        }
    });
}

var map;
var directionsDisplay;
var directionsService;
var makerArray = [];

function initMap() {

    directionsDisplay = new google.maps.DirectionsRenderer();
    directionsService = new google.maps.DirectionsService();
    map = new google.maps.Map(document.getElementById('mapview'), {
        center: { lat: 24.136915, lng: 120.685153 },
        zoom: 14,
    });
    directionsDisplay.setMap(map);
}


function pos(i) {
    initMap()
    var lat1 = data.line[i].pos1.lat;
    var lng1 = data.line[i].pos1.lng;
    // var marker1 = new google.maps.Marker({   position: { lat: lat1, lng: lng1 },   map: map,   title: 'Hello World!'  });
    var lat2 = data.line[i].pos2.lat;
    var lng2 = data.line[i].pos2.lng;
    // var marker1 = new google.maps.Marker({   position: { lat: lat2, lng: lng2 },   map: map,   title: 'Hello World!'  });
    var lat3 = data.line[i].pos3.lat;
    var lng3 = data.line[i].pos3.lng;
    // var marker1 = new google.maps.Marker({   position: { lat: lat3, lng: lng3 },   map: map,   title: 'Hello World!'  });
    var start = { lat: lat1, lng: lng1 };
    var end = { lat: lat2, lng: lng2 };
    var request = {
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode.WALKING,
        waypoints: [{
            location: {
                lat: lat3,
                lng: lng3,
            },
            stopover: false
        }]
    };
    directionsService.route(request, function(result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(result);
        }
    });
}

var data = '';

function setData(result) {
    data = result;
}

function renderLine() {
    var str = "";
    var node = document.getElementById("line");
    setData(data);
    for (var i = 0; i < data.line.length; i++) {
        var title = data.line[i].title;
        var line_id = data.line[i].line_id;
        var str = str + '<button type="button" class="list-group-item" onclick="pos(' + i + ')">' + title + '</button>';
    }
    node.innerHTML = str;
}

Data();