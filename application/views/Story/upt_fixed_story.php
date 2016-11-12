<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/upt-css.css')?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $("button").click(function() { //點擊狀態觸發
      var story_status=$(this).val();
      $('#story_name').val('stf_'+story_status);
      $.ajax({
        type: "POST",
        url: "<?=site_url('Story/sel_fixed_story')?>",
        dataType: "json",
        data: {
          story_name: story_status
        },
        success: function(data) {
          $('#story_content').val(data["stf_"+story_status]);
        },
        error: function(e, a, f) {
          alert(f);
        }
      });
    })
    
    function getData() {
      $.ajax({
        type: "POST",
        url: "<?=site_url('Story/sel_fixed_story')?>",
        dataType: "json",
        success: function(data) {
          $('#story_content').val(data.stf_begin);
        },
        error: function(e, a, f) {
          alert(f);
        }
      });
    }
    getData();
  })
</script>
<div id="page-wrapper">
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-header">故事管理</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div>
      <div class="panel panel-default">
        <div class="panel-heading">
          更新故事
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <button id="story-begin" type="button" class="btn btn-success" value="begin">現況</button>
              <button id="story-end" type="button" class="btn btn-success" value="end">結局</button>
            </div>
          </div>
          <div>
            <form action="<?=site_url('Story/upt_db_fixed_story')?>" method="POST">
              <input type="hidden" id="story_name" name="story_name" value="1">
              <h2>故事內容：</h2>
              <textarea class="form-control" id="story_content" rows="9" name="story_content" placeholder="故事內容空白" required></textarea>
              <br>
              <input class="btn btn-default" type="submit" value="送出">
            </form>
          </div>
          <!-- /.row (nested) -->
        </div>

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