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
</style>
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-md-12 fun-bar">
      <div class="container">
        <ul class="nav nav-pills" id="fun-bar">
          <li><a href="#story">觀看故事</a></li>
          <li><a href="#route">景點資訊</a></li>
          <li><a href="#map">查看地圖</a></li>
        </ul>
      </div> 
    </div>
    <div class="col-md-6 col-md-offset-3">
      <h2 class="text-center page-header"  style="padding-top:20px;">這是屬於<span id="name"><?=$name?></span>的故事</h2>
      <h3 id="storyLocation"></h3>
      <div id="View"><p id="story" class="lead"></p></div>
      <button type="submit" class="btn btn-primary" style="width:100%;margin-bottom:20px;" onclick="Next_step()">下一步</button>
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
  var lat;
  var lng;

  function renderStory() {
    document.getElementById('story').innerHTML = story_data.story[step];
    document.getElementById('storyLocation').innerHTML = story_data.story_location[step].lc_name;
    lat = story_data.story_location[step].lat
    lng = story_data.story_location[step].lng
    console.log(story_data.story[step]);
  }

  var map;
   var makerArray = [];
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: { lat: 24.140793, lng: 120.676346 },
      zoom: 14,
      mapTypeControl: false,
      streetViewControl: false,
    });
    console.log(lat)
    console.log(lng)
    makerArray[makerArray.length] = new google.maps.Marker({   position: { lat: parseFloat(lat), lng: parseFloat(lng) },   map: map,   title: 'Hello World!'   }); 
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

    RouteViewObj.map = map
    RouteViewObj.story = story

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
  }

  getAnchor()
  Route("#story")
</script>
