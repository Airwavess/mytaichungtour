


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
                <a class="navbar-brand" href="index.html">MyTaichungTour</a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
    
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i>景點管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="create">新增景點</a>
                                </li>
                                <li>
                                    <a href="#">修改景點</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">景點管理</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	修改景點
                        	<?php echo validation_errors(); ?>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-6">

                                <table class="table table-hover">
 								<thead>
 								<tr>
 								<th>#</th>	
 								<th>景點名稱</th>
 								<th>圖片路徑</th>
 								<th>景點描述</th>
 								<th>景點地址</th>
 								<th>經度</th>
 								<th>緯度</th>
 								<th>修改</th>
 								<th>刪除</th>
 								</tr>
 								</thead>
 								<tbody>
 									<?php
									foreach ($data->result() as $row) {
									?>
										<tr>
 										<td>
 											<?="$row->lc_id"?>
 										</td>
 										<td>
 											<?="$row->lc_name"?>
 										</td>
 										<td>
 											<?="$row->img_path"?>
 										</td>
 										<td>
 											<?="$row->description"?>
 										</td>
 										<td>
 											<?="$row->address"?>
 										</td>
 										<td>
 											<?="$row->lat"?>
 										</td>
 										<td>
 											<?="$row->lng"?>
 										</td>
 										<td>
 											
 										</td>
 										<td>
 											
 										</td>
 										</tr>		
								<?php  }?>

 								</tbody>
                                
								</table>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
