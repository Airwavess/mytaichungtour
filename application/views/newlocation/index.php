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
 									$count=0;
									foreach ($data->result() as $row) {
									
									?>
										<tr>
											<!-- ID -->
	 										<td>
	 											<?=++$count?>
	 										</td>
	 										<!-- 景點名 -->
	 										<td>
	 											<?="$row->lc_name"?>
	 										</td>
	 										<!-- 景點圖片 -->
	 										<td>
	 											<?="$row->img_path"?>
	 										</td>
	 										<!-- 景點描述 -->
	 										<td>
	 											<?="$row->description"?>
	 										</td>
	 										<!-- 地址 -->
	 										<td>
	 											<?="$row->address"?>
	 										</td>
	 										<!-- 經 -->
	 										<td>
	 											<?="$row->lat"?>
	 										</td>
	 										<!-- 緯 -->
	 										<td>
	 											<?="$row->lng"?>
	 										</td>
	 										<!-- 修改 -->
	 										<td>
	 											<a href="modify?lc_id=<?="$row->lc_id"?>" >
	 											<button type="button" class="btn btn-warning">修改</button>
	 										</td>
	 										<!-- 刪除 -->
	 										<td>
	 											<a href="delete?lc_id=<?="$row->lc_id"?>" >
	 											<button type="button" class="btn btn-danger">刪除</button>
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
