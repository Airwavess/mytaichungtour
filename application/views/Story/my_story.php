<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>故事中城</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?=base_url('assets/css/modern-business.css" rel="stylesheet" ')?>">

<!-- Custom Fonts -->
<link href="<?=base_url('assets/vendor/font-awesome/css/font-awesome.min.css ')?>" rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">故事中城</a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="about.html">會員登入</a>
          </li>
          <li>
            <a href="services.html">使用說明</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <h2 class="text-center">這是屬於<span id="name"><?=$name?></span>的故事</h2>
        <h3 id="story"></h3>
        <button type="submit" class="btn btn-primary" style="width:100%;" onclick="Next_step()">下一步</button>
      </div>
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
      interval: 5000
    })

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
          console.log(story_data);
          renderStory();
        },
        error: function(e, a, f) {
          alert(f);
        }
      });
    })

    function Next_step() {
      if(step<MaxStep-1){
				step = step + 1;
				renderStory();
			}
    }

    function renderStory() {
      document.getElementById('story').innerHTML = story_data.story_location[step];
      console.log(story_data.story_location[step]);
    }
  </script>
</body>

</html>