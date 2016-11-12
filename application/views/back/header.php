<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MyTaichungTour後台</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="<?=base_url('assets/vendor/metisMenu/metisMenu.min.css')?>" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?=base_url('assets/css/sb-admin-2.css')?>" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="<?=base_url('assets/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">MyTaichungTour</a>
      </div>
      <!-- /.navbar-header -->

      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">

            <li>
              <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-edit fa-fw"></i>景點管理<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="<?=site_url('newlocation/create')?>">新增景點</a>
                </li>
                <li>
                  <a href="<?=site_url('newlocation/index')?>">修改景點</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-edit fa-fw"></i>故事管理<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="<?=site_url('Story/upt_story')?>">更新故事</a>
                </li>
                <li>
                  <a href="<?=site_url('Story/upt_fixed_story')?>">更新現況＆結局</a>
                </li>
                  <!--<li>
                    <a href="<?=site_url('Story/upt_location')?>">更新故事地點</a>
                  </li>-->
              </ul>
            </li>
          </ul>
          <!-- /.nav-second-level -->
          </li>
          </ul>
        </div>
        <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
    </nav>