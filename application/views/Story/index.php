<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=圖片一');"></div>
      <div class="carousel-caption">
        <h2>為你自己創作一個故事吧</h2>
      </div>
    </div>
    <div class="item">
      <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=圖片二');"></div>
      <div class="carousel-caption">
        <h2>為你自己創作一個故事吧#</h2>
      </div>
    </div>
    <div class="item">
      <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=圖片三');"></div>
      <div class="carousel-caption">
        <h2>為你自己創作一個故事吧##</h2>
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
            <input type="text" class="form-control" id="name" name="name" placeholder="例如:Alex" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary" style="width:100%;">創作故事</button>
      </form>
    </div>
  </div>
  <!-- /.container -->

  <!-- jQuery -->
  <script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="<?=base_url('assets/vendor/metisMenu/metisMenu.min.js')?>"></script>

  <!-- Custom Theme JavaScript -->
  <script src="<?=base_url('assets/scripts/sb-admin-2.js')?>"></script>

  <!-- Script to Activate the Carousel -->
  <script>
    $('.carousel').carousel({
      interval: 5000 //changes the speed
    })
  </script>