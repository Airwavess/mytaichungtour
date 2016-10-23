



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
