    <style>
      /* This is stylesheet */
      /* Jim 2016/11/10 */
      .fun-bar {
        background-color: #505050;
        z-index:2;position:fixed;
        top:50px;left:0;
        width:100%;
      }

      .fun-bar a:hover{
        color: #000000!important;
      }

      .fun-bar .active a:hover{
        color: #FFFFFF!important;
      }

      .fun-bar li a{
        border-radius: 0%!important;
      }

      .mapview {
        height:100vh;
        top: 0px; 
        z-index:1;
      }

      .msg {
        z-index:100;
        position:absolute;
        top: 50px;
      }

    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12 fun-bar">
              <div class="container">
                <ul class="nav nav-pills" id="fun-bar">
                    <li><a href="#add">新增地點</a></li>
                    <li><a href="#route">路線規劃</a></li>
                    <li><a href="#map">查看地圖</a></li>
                </ul>
               </div> 
            </div>
        </div>
    </div>
    <div id="msg" class="col-md-12"></div>
    <div class="container">
      <div class="row">
          <!--<div class="list-group col-md-3" style="position:absolute;z-index:2;top:60px;left:10px;height:410px;padding-right: 0;">
              <a href="#" class="list-group-item active">選擇地點</a>
              <div id="line" style="overflow-y: auto;height:100%;background-color:#fff;"></div>
              <button type="button" id="more" class="list-group-item" onclick="" style="font-size:20px;background-color:#CCC;">下一頁</button>
          </div>-->
          <!--<div id="selectedList" class="list-group col-md-3" style="position:fixed;z-index:1;top:60px;left:370px;height:410px;;padding-right: 0;">
              <a href="#" class="list-group-item active">已選擇地點</a>
              <div id="selected" style="overflow-y: auto;height:100%;background-color:#fff;"></div>
              <button type="button" class="list-group-item" onclick="calculateAndDisplayRoute()" style="font-size:20px;background-color:#CCC;">計算路線</button>
          </div>-->
          <div class="col-md-12 mapview" id="View">
          </div>
       </div>   
    </div>
    