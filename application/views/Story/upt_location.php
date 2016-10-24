<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">故事管理</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          更新地點
        </div>
        <div class="panel-body">
          <div class="col-md-6">
            <form action="<?=site_url('Story/upt_db_story')?>" method="POST">
              <input type="hidden" id="story-category" name="story_id" value="1">
              <h2>對應字母：</h2>
              <input type="text" id="story_name" name="story_name" class="form-control" placeholder="對應字母空白">
              <h2>故事地點：</h2>
              <textarea class="form-control" id="story_location" rows="9" name="story_content" placeholder="故事地點空白"></textarea>
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