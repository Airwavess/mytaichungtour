<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" id="myCarousel">
    <div class="item active">
      <div class="fill" style="background-image:url('<?=base_url('assets/img/img2.jpg')?>');"></div>
      <div class="carousel-caption">
        <h2>為你自己創作一個故事吧</h2>
      </div>
    </div>
    <div class="item">
      <div class="fill" style="background-image:url('<?=base_url('assets/img/img3.jpg')?>');"></div>
      <div class="carousel-caption">
        <h2>為你自己創作一個故事吧</h2>
      </div>
    </div>
    <div class="item">
      <div class="fill" style="background-image:url('<?=base_url('assets/img/img4.jpg')?>');"></div>
      <div class="carousel-caption">
        <h2>為你自己創作一個故事吧</h2>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="icon-next"></span>
  </a>
</header>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form id="contactForm" action="<?=site_url('Story/userStory')?>" method="GET">
        <div class="control-group form-group">
          <div class="controls">
            <h1 class="text-center">請輸入你的名字</h1>
            <input type="text" class="form-control" id="name" name="name" placeholder="例如Alex，請輸入3~8個英文字母" required maxlength="8">
          </div>
        </div>
        <button type="button" id="modal-btn" class="btn btn-primary" style="width:100%;" data-toggle="modal">開始旅程</button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="top: 30vh;">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center" id="myModalLabel">Hi,<span id="modal-name"></span></h3>
                <h3 class="text-center">歡迎來到故事中城</h3>
                <div class="text-right" style="padding-top: 10px;">
                  <button type="submit" class="btn btn-primary ">開始</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" style="top: 30vh;">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title text-center" id="myModalLabel">請重新輸入姓名</h3>
        </div>
        <div class="modal-body text-center">
          <h4 id="modal-name">輸入3~8個英文字</h4>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" data-dismiss="modal" aria-label="Close">ok</button>
        </div>
      </div>
    </div>
  </div>
  
<div class="row" id="locatoin">
  <div class="col-lg-12">
    <h2 class="page-header">景點</h2>
  </div>
 
    <?php
    foreach ($data->result() as $row) {
    ?>
    <div class="col-md-3 col-sm-6">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <span class="fa-stack fa-5x">
          <i class="fa fa-circle fa-stack-2x text-primary"></i>
          <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
          </span>
        </div>
        <div class="panel-body">

          <!-- 景點名 -->
          <h4><?="$row->lc_name"?></h4>
          <!-- 景點描述 -->
          <p><?="$row->description"?></p>

          <a class="btn btn-primary" href="<?=site_url('Newlocation/view')?>?lc_id=<?="$row->lc_id"?>">了解更多</a>
        </div>
      </div>
    </div>  
      <?php  }?>
    
     
  </div>
</div>

  <!-- /.container -->

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>

  <!-- Script to Activate the Carousel -->
  <script>
    $('.carousel').carousel({
      interval: 5000 //changes the speed
    })
    $("#modal-btn").click(function() {
      $('#myInput').focus();
      var name = document.getElementById('name').value;
      var re = /^[A-Za-z]{3,8}$/.test(name);
      if (re) {
        document.getElementById('modal-name').innerHTML = name;
        $('#myModal').modal('show');
      } else {
        $('#errorModal').modal('show');
      }
    });

    $("#myCarousel").swiperight(function() {
      $(this).carousel('prev');
    });
    $("#myCarousel").swipeleft(function() {
      $(this).carousel('next');
    });

    $.mobile.loader.prototype.options.disabled = true;
    $.mobile.loading("hide");
    $.mobile.loading().hide();
    $.mobile.ajaxEnabled = false;
    $.mobile.loadingMessage = false;

    document.getElementsByClassName('ui-loader').innerHTML = " ";
  </script>
  <style>
    @media screen and (max-width: 768px) {
      #locatoin {
        display: none;
      }
    }
  </style>