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
    directionsDisplay = new google.maps.DirectionsRenderer();
    directionsService = new google.maps.DirectionsService();

    map = new google.maps.Map(document.getElementById('mapView'), {
        center: { lat: 24.140793, lng: 120.676346 },
        zoom: 14,
        mapTypeControl: false,
        streetViewControl: false,
    });

    infowindow = new google.maps.InfoWindow();

    makerArray = [];
    selectArray = [];
    waypts = [];

    directionsDisplay.setMap(map); 
}


function pos(lat, lng, i) {
    var selected = { lat, lng, i };
    var isSelected = false;
    var len = selectArray.length;

    if (len == 0) {
        makerArray[makerArray.length] = new google.maps.Marker({   position: { lat: lat, lng: lng },   map: map,   title: 'Hello World!'  });
        map.setZoom(14);  
        map.setCenter({ lat: selected.lat, lng: selected.lng - 0.01 });
        selectArray.push(selected);
        //renderSelected();
    } else {
        for (var i = 0; i < len; i++) {
            if (JSON.stringify(selectArray[i]) == JSON.stringify(selected)) {
                isSelected = true;
                break;
            }
        }
        if (isSelected != true) {
            makerArray[makerArray.length] = new google.maps.Marker({   position: { lat: lat, lng: lng },   map: map,   title: 'Hello World!'  });
            map.setZoom(14);  
            map.setCenter({ lat: selected.lat, lng: selected.lng - 0.01 });
            selectArray.push(selected);
            waypts.push({    
                location: selected,
                stopover: true   
            });
            //renderSelected()
        } else {
            var str = '<div class="alert alert-warning alert-dismissible" role="alert">';
            str += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            str += '<strong>此地點已選取</strong></div>';
            //document.getElementById('msg').innerHTML = str;
        }
    }
    showSteps();
}


function setMapOnAll(map) { 
    for (var i = 0; i < makerArray.length; i++) {  
        makerArray[i].setMap(map); 
    }
}

function calculateAndDisplayRoute() {
    setMapOnAll(null);
    var len = selectArray.length;
    var start = { lat: selectArray[0].lat, lng: selectArray[0].lng };
    var end = { lat: selectArray[len - 1].lat, lng: selectArray[len - 1].lng };

    var request = {
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode.WALKING,
        waypoints: waypts

    };
    directionsService.route(request, function(result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(result);
        }
    });


    showSteps();
}

function showSteps() {
    for (var i = 0; i < makerArray.length; i++) {
        var title = data[selectArray[i].i].name;
        var address = data[selectArray[i].i].formatted_address;
        var place_id = data[selectArray[i].i].place_id;
    }
}



function attachInstructionText(marker, text) {
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(text);
        infowindow.open(map, marker);
    });
}

function renderLine(data) {
    var str = "";
    var node = document.getElementById("line");

    for (var i = 0; i < data.length; i++) {
        var title = data[i].lc_name;
        var adddress = data[i].address;
        var lat = data[i].lat;
        var lng = data[i].lng;
        str = str + '<button type="button" class="list-group-item" onclick="pos(' + lat + "," + lng + "," + i + ')">' + title + "<br>" + adddress + '</button>';
    }
    node.innerHTML = str;
}

function renderSelected() {
    var str = "";
    var node = document.getElementById("selected");

    for (var i = 0; i < selectArray.length; i++) {
        var chr = String.fromCharCode(65 + i);
        var title = data[selectArray[i].i].lc_name;
        var adddress = data[selectArray[i].i].address;
        var lat = data[selectArray[i].i].lat;
        var lng = data[selectArray[i].i].lng;
        var str = str + '<a href="#" class="list-group-item" onclick="displayStep('+lat+','+ lng +')"><span class="badge">' + chr + '</span>' + title + '<br>' + adddress + '</a>';
    }
    node.innerHTML = str;

    if (str.length > 0)
        document.getElementById("selectedList").style.display = "block";

    calculateAndDisplayRoute()
}

function displayStep(lat, lng){
    map.setCenter({ lat: lat, lng: lng- 0.01 });
    map.setZoom(14);
}


/* UI */

function RouteView(Anchor) {
    var RouteViewObj = new Object() 
    
    function add(data){
        var View = document.getElementById('View')
        View.innerHTML = "<div class='list-group col-md-3 list'><a href='#' class='list-group-item active'>選擇地點</a><div id='line' style='overflow-y: auto;height:100%;background-color:#fff;'></div></div>"
        renderLine(data)
    }

    function selected(){
        var View = document.getElementById('View')
        View.innerHTML = "<div id='selectedList' class='list-group col-md-3 list' ><a href='#' class='list-group-item active'>已選擇地點</a><div id='selected' style='overflow-y: auto;height:100%;background-color:#fff;'></div></div>"
        renderSelected()
    }

    RouteViewObj.add = add
    RouteViewObj.selected = selected

    return RouteViewObj 
}

function MapLocation(){
    var MapLocationObj = new Object()

    function setData(data){
        this.data = data
    }

    function getData(){
        return data;
    }

    MapLocationObj.setData = setData
    MapLocationObj.getData = getData

    return MapLocationObj
}

var RouteViewObj = new RouteView()
var MapLocationObj = new MapLocation()

function loadData() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      data = JSON.parse(this.responseText);
      MapLocationObj.setData(data)
    }else{
        console.log(this.status)
    }
  }
  xhttp.open("GET", "http://localhost/mytaichungtour/index.php/Schedule/query?q=location", true)
  xhttp.send()
}

loadData()

function Route(Anchor){
    switch(Anchor){
        case '#add':
            data = MapLocationObj.getData()
            RouteViewObj.add(data)
            break
        case '#route':
            RouteViewObj.selected()
            break
        case '#map':
            document.getElementById('View').innerHTML ="";
            break
        default:
            break
    }
}

function getAnchor(){
    var fun_bar_li = document.getElementById('fun-bar').children
    var Anchor;
    for(var i = 0; i < fun_bar_li.length; i++){
        fun_bar_li[i].addEventListener("click", function(){
            Anchor = this.children[0].getAttribute('href')

            for(var i = 0; i < fun_bar_li.length; i++){
                if(fun_bar_li[i].getAttribute("class") == "active"){
                    fun_bar_li[i].className = ""
                }
            }

            if(this.getAttribute("class") != "active"){
                    this.className += "active"
            }

            Route(Anchor)
        })

    }
}

getAnchor()
