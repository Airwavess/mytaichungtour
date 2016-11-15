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
                    <?php echo validation_errors('<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>','</div>'); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        	新增景點
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="POST" action="<?=site_url("newlocation/create")?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>景點名稱：</label>
                                            <input type="text" class="form-control" name="lc_name">
                                        </div>
                                        <div class="form-group">
                                            <label>圖片上傳：</label>
                                            <input type="file" name="imgFile">
                                        </div>
                                        <div class="form-group">
                                            <label>景點敘述：</label>
                                            <input type="text" class="form-control" name="description">
                                        </div>
                                        <div class="form-group">
                                            <label>景點地址：</label>
                                            <input type="text" class="form-control" name="address">
                                        </div>
                                        <div class="form-group">
                                            <label>經度：</label>
                                            <input type="text" class="form-control" name="lat">
                                        </div>
                                        <div class="form-group">
                                            <label>緯度：</label>
                                            <input  type="text" class="form-control" name="lng">
                                        </div>
                                        <button type="submit" class="btn btn-primary">新增</button>
                                    </form>
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