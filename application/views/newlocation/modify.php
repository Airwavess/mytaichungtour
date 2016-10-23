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
                                    <form role="form" method="POST" action="<?=site_url("newlocation/modify")?>">
                                    <?php
                                    foreach ($data->result() as $row) {
                                    
                                    ?>
                                        <input type="hidden" name="lc_id" value="<?=$row->lc_id?>">
                                        <div class="form-group">
                                            <label>景點名稱：</label>
                                            <input class="form-control" name="lc_name" value="<?=$row->lc_name?>">
                                        </div>
                                        <div class="form-group">
                                            <label>圖片路徑：</label>
                                            <input class="form-control" name="img_path" value="<?=$row->img_path?>">
                                        </div>
                                        <div class="form-group">
                                            <label>景點敘述：</label>
                                            <input class="form-control" name="description" value="<?=$row->description?>">
                                        </div>
                                        <div class="form-group">
                                            <label>景點地址：</label>
                                            <input class="form-control" name="address" value="<?=$row->address?>">
                                        </div>
                                        <div class="form-group">
                                            <label>經度：</label>
                                            <input class="form-control" name="lat" value="<?=$row->lat?>">
                                        </div>
                                        <div class="form-group">
                                            <label>緯度：</label>
                                            <input class="form-control" name="lng" value="<?=$row->lng?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary">修改完成</button>
                                    </form>
                                <?php  }?>
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