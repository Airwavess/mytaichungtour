<!DOCTYPE html>
<html>

<head>

    <title>台中行程規劃小幫手</title>

    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body style="margin:0;padding:0;height:100vh;overflow-y: hidden;overflow-x: hidden;font-family: Microsoft JhengHei;">
    <nav class="navbar navbar-default" style="top:0px;z-index:2;background-color: #96e7d6;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="font-weight: 900;font-size:25px;">台中行程規劃小幫手</a>
                <ul class="nav navbar-nav">
                    <li><a href="#" onclick="initMap()">清除路線</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="msg" class="col-md-12" style="z-index:100;position:absolute;top: 50px;"></div>
    <div class="row">
        <div class="list-group col-md-3" style="position:absolute;z-index:2;top:60px;left:10px;height:410px;padding-right: 0;">
            <a href="#" class="list-group-item active">選擇地點</a>
            <div id="line" style="overflow-y: auto;height:100%;background-color:#fff;"></div>
            <button type="button" id="more" class="list-group-item" onclick="" style="font-size:20px;background-color:#CCC;">下一頁</button>
        </div>
        <div id="selectedList" class="list-group col-md-3" style="position:fixed;z-index:2;top:60px;left:370px;height:410px;;padding-right: 0;">
            <a href="#" class="list-group-item active">已選擇地點</a>
            <div id="selected" style="overflow-y: auto;height:100%;background-color:#fff;"></div>
            <button type="button" class="list-group-item" onclick="calculateAndDisplayRoute()" style="font-size:20px;background-color:#CCC;">計算路線</button>
        </div>
    </div>
    <div id="mapview" style="height:100%;top: -80px;z-index:1;"></div>
</body>
<script src="<?=base_url("assets/scripts/map.js")?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeomCbkr7arq7I2GQlw9hrE-zdso8SoVQ&libraries=places&callback=initMap" async defer></script>

</html>