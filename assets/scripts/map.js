var data;
var map;
var directionsDisplay;
var directionsService;
var infowindow;
var service;
var infowindow;
var makerArray = [];
var selectArray = [];
var waypts = [];

function initMap() {
    // document.getElementById("selectedList").style.display = "none";

    directionsDisplay = new google.maps.DirectionsRenderer();
    directionsService = new google.maps.DirectionsService();

    map = new google.maps.Map(document.getElementById('View'), {
        center: { lat: 24.140793, lng: 120.676346 },
        zoom: 14,
        mapTypeControl: false,
        streetViewControl: false,
    });

    var request = {  
        location: { lat: 24.136916, lng: 120.685144 },
        radius: '5000',
        query: 'restaurant'
    };

    infowindow = new google.maps.InfoWindow();

    // service = new google.maps.places.PlacesService(map);
    // service.textSearch(request, callback);

    // makerArray = [];
    // selectArray = [];
    // waypts = [];

    // renderSelected();
    directionsDisplay.setMap(map);
}

// function callback(results, status, pagination) { 
//     console.log(pagination);
//     if (status == google.maps.places.PlacesServiceStatus.OK) {  
//         data = JSON.stringify(results);
//         data = JSON.parse(data);
//         next_page = data;
//         console.log(data);
//         renderLine();
//     }else{
//         if (pagination.hasNextPage) {
//             var moreButton = document.getElementById('more');
//             moreButton.disabled = false;
//             moreButton.addEventListener('click', function() {
//                 moreButton.disabled = true;
//                 pagination.nextPage();
//             });
//         }
 
//     }
// }


// function pos(lat, lng, i) {
//     var selected = { lat, lng, i };
//     var isSelected = false;
//     var len = selectArray.length;

//     if (len == 0) {
//         makerArray[makerArray.length] = new google.maps.Marker({   position: { lat: lat, lng: lng },   map: map,   title: 'Hello World!'  });
//         map.setZoom(14);  
//         map.setCenter({ lat: selected.lat, lng: selected.lng - 0.01 });
//         selectArray.push(selected);
//         renderSelected();
//     } else {
//         for (var i = 0; i < len; i++) {
//             if (JSON.stringify(selectArray[i]) == JSON.stringify(selected)) {
//                 isSelected = true;
//                 break;
//             }
//         }
//         if (isSelected != true) {
//             makerArray[makerArray.length] = new google.maps.Marker({   position: { lat: lat, lng: lng },   map: map,   title: 'Hello World!'  });
//             map.setZoom(14);  
//             map.setCenter({ lat: selected.lat, lng: selected.lng - 0.01 });
//             selectArray.push(selected);
//             waypts.push({    
//                 location: selected,
//                 stopover: true   
//             });
//             renderSelected()
//         } else {
//             var str = '<div class="alert alert-warning alert-dismissible" role="alert">';
//             str += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
//             str += '<strong>此地點已選取</strong></div>';
//             document.getElementById('msg').innerHTML = str;
//         }
//     }
//     showSteps();
// }


// function setMapOnAll(map) { 
//     for (var i = 0; i < makerArray.length; i++) {  
//         makerArray[i].setMap(map); 
//     }
// }

// function calculateAndDisplayRoute() {
//     setMapOnAll(null);
//     var len = selectArray.length;
//     var start = { lat: selectArray[0].lat, lng: selectArray[0].lng };
//     var end = { lat: selectArray[len - 1].lat, lng: selectArray[len - 1].lng };

//     var request = {
//         origin: start,
//         destination: start,
//         travelMode: google.maps.TravelMode.WALKING,
//         waypoints: waypts

//     };
//     directionsService.route(request, function(result, status) {
//         if (status == google.maps.DirectionsStatus.OK) {
//             directionsDisplay.setDirections(result);
//         }
//     });


//     showSteps();
// }

// function showSteps() {
//     for (var i = 0; i < makerArray.length; i++) {
//         var title = data[selectArray[i].i].name;
//         var address = data[selectArray[i].i].formatted_address;
//         var place_id = data[selectArray[i].i].place_id;
//     }
// }



// function attachInstructionText(marker, text) {
//     google.maps.event.addListener(marker, 'click', function() {
//         infowindow.setContent(text);
//         infowindow.open(map, marker);
//     });
// }

// function renderLine() {
//     var str = "";
//     var node = document.getElementById("line");

//     for (var i = 0; i < data.length; i++) {
//         var title = data[i].name;
//         var adddress = data[i].formatted_address;
//         var lat = data[i].geometry.location.lat;
//         var lng = data[i].geometry.location.lng;
//         str = str + '<button type="button" class="list-group-item" onclick="pos(' + lat + "," + lng + "," + i + ')">' + title + "<br>" + adddress + '</button>';
//     }
//     node.innerHTML = str;
// }

// function renderSelected() {
//     var str = "";
//     var node = document.getElementById("selected");

//     for (var i = 0; i < selectArray.length; i++) {
//         var chr = String.fromCharCode(65 + i);
//         var title = data[selectArray[i].i].name;
//         var adddress = data[selectArray[i].i].formatted_address;
//         var str = str + '<a href="#" class="list-group-item"><span class="badge">' + chr + '</span>' + title + '<br>' + adddress + '</a>';
//     }
//     node.innerHTML = str;

//     if (str.length > 0)
//         document.getElementById("selectedList").style.display = "block";
// }


/* UI */

function View(Anchor) {
    // console.log(Anchor);
    switch(Anchor){
        case '#add':
            add()
            break
        case '#route':
            break
        case '#map':
            initMap()
            break
        default:
            break            
    }

    function add(){
        var View = document.getElementById('View')
        View.innerHTML = "123123132132"
    }

}

function Route(){
    var fun_bar_li = document.getElementById('fun-bar').children
    var Anchor;
    for(var i = 0; i < fun_bar_li.length; i++){
        fun_bar_li[i].addEventListener("click", function(){
            Anchor = this.children[0].getAttribute('href');
            console.log(Anchor)
            View(Anchor)
        })

    }
}

Route()
