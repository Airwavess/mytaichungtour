<style>
      /* This is stylesheet */
      /* Jim 2016/11/10 */
      .fun-bar {
        background-color: #505050;
        z-index:2;
        position:fixed;
        top:50px;left:0;
        width:100%;
        min-width: 360px;
      }

      .fun-bar a:hover,.fun-bar a:focus{
        color: #000000!important;
      }

      .fun-bar .active a:hover,.fun-bar .active a:focus{
        color: #FFFFFF!important;
      }

      .fun-bar li a{
        border-radius: 0%!important;
      }
      p pre {
        width: 100%;
        display: inline-block;
        white-space: pre-wrap; /* css-3 */
        white-space: -moz-pre-wrap; /* Mozilla, since 1999 */
        white-space: -pre-wrap; /* Opera 4-6 */
        white-space: -o-pre-wrap; /* Opera 7 */
        word-wrap: break-word; /* Internet Explorer 5.5+ */
        border: 0px ;
        font-size: 20px;
        font-family: Microsoft JhengHei;
        overflow: hidden;
        padding: 0;
        background-color: #ffffff;
      }
      @media screen and (max-width: 768px) {
        p pre {
          width:93vw;
        }
      }
</style>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-md-12 fun-bar">
      <div class="container">
        <ul class="nav nav-pills" id="fun-bar">
          <li><a href="#story">觀看故事</a></li>
          <!--<li><a href="#route">景點資訊</a></li>-->
          <li><a href="#map">查看地圖</a></li>
        </ul>
      </div> 
    </div>
    <div class="col-md-6 col-md-offset-3">
      <h2 class="text-center page-header"  style="padding-top:20px;">這是屬於<span id="name"><?=$name?></span>的故事</h2>
      <h3 id="storyLocation"></h3>
      <div id="View"><p id="story" class="lead"><button type="submit" class="btn btn-primary" style="width:100%;margin-bottom:20px;" onclick="Next_step()">下一步</button></p></div>
    </div>
  </div>
</div>
<!-- /.container -->

<!-- jQuery -->
<script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeomCbkr7arq7I2GQlw9hrE-zdso8SoVQ"></script>
<script>
  var story_data;
  var step = 0;
  var MaxStep = 0;
  $(document).ready(function() {
    $.ajax({
      type: "GET",
      url: "<?=site_url('Story/my_story')?>",
      dataType: "json",
      data: {
        user_name: $('#name').text()
      },
      success: function(data) {
        story_data = data;
        MaxStep = story_data.story_location.length;
        console.log(data)
        renderStory();
      },
      error: function(e, a, f) {
        alert(f);
      }
    });
  })

  function Next_step() {
    if (step < MaxStep - 1) {
      step = step + 1;
      renderStory();
    }
  }

  function Pre_step() {
    if (step < MaxStep - 1) {
      step = step - 1;
      renderStory();
    }
  }

  var lat1;
  var lng1;
  var lat2;
  var lng2;

  function renderStory() {
    var btn = ''
    if(step != MaxStep-1){
      if(step>0){
        btn = '<button type="submit" class="btn btn-primary" style="width:100%;margin:5px 0;" onclick="Pre_step()">上一步</button>'
      }
      btn += '<button type="submit" class="btn btn-primary" style="width:100%;margin:5px 0;" onclick="Next_step()">下一步</button>'
    }else{
      btn = '<a href="#"  class="btn btn-primary" style="width:100%;margin:5px 0;">分享你/妳的故事</a><a href="/"  class="btn btn-primary" style="width:100%;margin:5px 0;" >回首頁</a>'
    }

    document.getElementById('story').innerHTML = '<pre>'+story_data.story[step] + '<pre>' + btn;
    document.getElementById('storyLocation').innerHTML = story_data.story_location[step].lc_name;
    lat1 = story_data.story_location[step].lat
    lng1 = story_data.story_location[step].lng

    if(step>0){
      lat2 = story_data.story_location[step-1].lat
      lng2 = story_data.story_location[step-1].lng
    }
    console.log(story_data.story[step]);    

    console.log(step)
    console.log(MaxStep)
    
    console.log(lat1)
    console.log(lng1)
    console.log(lat2)
    console.log(lng2)
    
  }

  var map;
  var markerArray = [];

  function initMap() {

    var directionsService = new google.maps.DirectionsService;
    
    map = new google.maps.Map(document.getElementById('map'), {
      center: { lat: 24.140793, lng: 120.676346 },
      zoom: 14,
      mapTypeControl: false,
      streetViewControl: false,
    });

    var directionsDisplay = new google.maps.DirectionsRenderer({map: map});
    var stepDisplay = new google.maps.InfoWindow;
   
    markerArray[markerArray.length] = new google.maps.Marker({   position: { lat: parseFloat(lat1), lng: parseFloat(lng1) },   map: map,   title: 'Hello World!'   }); 
    
    if(step>0){
      calculateAndDisplayRoute(directionsDisplay, directionsService, markerArray, stepDisplay, map);
    }
}

  function calculateAndDisplayRoute(directionsDisplay, directionsService,markerArray, stepDisplay, map) {
    for (var i = 0; i < markerArray.length; i++) {
      markerArray[i].setMap(null);
    }
    console.log(lat1)
    console.log(lng1)
    console.log(lat2)
    console.log(lng2)

    directionsService.route({
      origin: { lat: parseFloat(lat2), lng: parseFloat(lng2) },
      destination: { lat: parseFloat(lat1), lng: parseFloat(lng1) },
      travelMode: google.maps.TravelMode.WALKING
    }, function(response, status) {
      if (status === google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
        showSteps(response, markerArray, stepDisplay, map);
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
  }

  function showSteps(directionResult, markerArray, stepDisplay, map) {
    var myRoute = directionResult.routes[0].legs[0];
    for (var i = 0; i < myRoute.steps.length; i++) {
      var marker = markerArray[i] = markerArray[i] || new google.maps.Marker;
      marker.setMap(map);
      marker.setPosition(myRoute.steps[i].start_location);
      attachInstructionText(
          stepDisplay, marker, myRoute.steps[i].instructions, map);
    }
  }

  function attachInstructionText(stepDisplay, marker, text, map) {
    google.maps.event.addListener(marker, 'click', function() {
      stepDisplay.setContent(text);
      stepDisplay.open(map, marker);
    });
  }




  function RouteView(Anchor) {
    var RouteViewObj = new Object() 
    
    function map(data){
        var View = document.getElementById('View')
        View.innerHTML = '<div id="map" style="width: 100%; height:40vh;margin-bottom:20px;"></div>'
        initMap()
    }

    function story(){
        var View = document.getElementById('View')
        View.innerHTML = '<p id="story" class="lead"></p>'
        renderStory()
    }

    function route(){
      var View = document.getElementById('View')
      View.innerHTML = '<p id="story" class="lead"></p>'
      renderStory()
    }

    RouteViewObj.map = map
    RouteViewObj.story = story
    RouteViewObj.route = route

    return RouteViewObj 
  }

  var RouteViewObj = new RouteView()
  function Route(Anchor){
    switch(Anchor){
        case '#map':
            RouteViewObj.map()
            break
        case '#story':
            RouteViewObj.story()
            break    
        default:
            break
    }
  }

  function getAnchor(){
    var fun_bar_li = document.getElementById('fun-bar').children
    console.log(fun_bar_li)
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
      if(fun_bar_li[0].getAttribute("class") != "active"){
        fun_bar_li[0].className += "active"
      }
  }

  getAnchor()
  Route('#story')
</script>