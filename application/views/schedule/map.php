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

      .mapview {
        height: 100vh;
        width: 100%; 
        top: 0px;
        left: 0px;
        z-index:1;
      }

      .msg {
        z-index:100;
        position:absolute;
        top: 50px;
      }

      .list {
        z-index: 2;
        position:absolute;
        top: 90px;
        left:0;
        width: 100vh;
        height: 80vh;
      }
      @media screen and (min-width: 768px) {
        .list {
          z-index: 2;
          position:absolute;
          top: 90px;
          left:0;
          width: 30%;
          height: 80vh;
        }
      }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12 fun-bar">
              <div class="container">
                <ul class="nav nav-pills" id="fun-bar">
                    <li><a href="#add">選擇地點</a></li>
                    <li><a href="#route">行程規劃</a></li>
                    <li><a href="#map">查看地圖</a></li>
                </ul>
               </div> 
            </div>
        </div>
    </div>
    <!--<div id="msg" class="col-md-12"></div>-->

      <div class="row" style="margin: 0!important;">
          <div class="col-md-12 View" id="View"></div>
          <div class="mapview" id="mapView"></div>
       </div>   

    <script src="<?=base_url("assets/scripts/map.js")?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeomCbkr7arq7I2GQlw9hrE-zdso8SoVQ&libraries=places&callback=initMap" async defer></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
    