<?php echo validation_errors();?>
<form role="form" method="POST" action="<?=site_url("location_view")?>">
<?php
    foreach ($data->result() as $row) {
?>
                <div class="form-group">
                    <label>景點名稱：</label>
                    <input class="" value="<?=$row->lc_name?>">
                </div>
                <div class="form-group">
                    <label>圖片路徑：</label>
                    <input class="" value="<?=$row->img_path?>">
                </div>
                <div class="form-group">
                    <label>景點敘述：</label>
                    <input class="" value="<?=$row->description?>">
                </div>
                <div class="form-group">
                    <label>景點地址：</label>
                    <input class="" value="<?=$row->address?>">
           		</div>
	<?php  }?>
</form>





