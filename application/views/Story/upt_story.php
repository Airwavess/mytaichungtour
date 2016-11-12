<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/upt-css.css')?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
  var story_status="call";//現況、招喚、協助....
  var ch_status="A";//點選的字母-地點
  $(document).ready(function() {
    $("#story-all-category>label").click(function() { //點擊狀態觸發
      story_status=$(this).children().val(); //故事狀態 現況、召喚、協助...
      ch_status=$("#story-location").val(); //字母-地點
      $("#story-ch").val(ch_status);
      $('#story-name').val("st_"+story_status);
      $.ajax({
        type: "POST",
        url: "<?=site_url('Story/sel_story')?>",
        dataType: "json",
        data: {
          story_ch: ch_status
        },
        success: function(data) {
          $('#story-content').val(data["st_"+story_status]);
        },
        error: function(e, a, f) {
          alert(f);
        }
      });
    })

    $("#story-location").change(function() {
      ch_status=$("#story-location").val();
      console.log(ch_status);
      $.ajax({
        type: "POST",
        url: "<?=site_url('Story/sel_story')?>",
        dataType: "json",
        data: {
          story_ch: ch_status
        },
        success: function(data) {
          $('#story-content').val(data["st_"+story_status]);
        },
        error: function(e, a, f) {
          alert(f);
        }
      });
    })
    function getData() {
      $.ajax({
        type: "POST",
        url: "<?=site_url('Story/sel_story')?>",
        dataType: "json",
        data: {
          story_ch: "A"
        },
        success: function(data) {
          $('#story-content').val(data["st_"+story_status]);
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
            <div class="col-md-7">
              <div id="story_location">
                <select id="story-location" class="form-control">
                  <option value="A">A 台中火車站</option>
                  <option value="B">B 繼光街</option>
                  <option value="C">C 演武場</option>
                  <option value="D">D 興中街</option>
                  <option value="E">E 第五市場</option>
                  <option value="F">F 柳原教堂</option>
                  <option value="G">G 豐中戲院</option>
                  <option value="H">H 太陽餅博物館</option>
                  <option value="I">I 第二市場</option>
                  <option value="J">J 台中文化創意園區</option>
                  <option value="K">K 20號倉庫</option>
                  <option value="L">L 彰化銀行總行</option>
                  <option value="M">M 天外天劇場</option>
                  <option value="N">N 一福堂</option>
                  <option value="O">O 台中公園</option>
                  <option value="P">P 初音町「樂舞台」</option>
                  <option value="Q">Q 中央書局</option>
                  <option value="R">R 台中市民館</option>
                  <option value="S">S 台中文學館</option>
                  <option value="T">T 台中州廳</option>
                  <option value="U">U 宮原眼科</option>
                  <option value="V">V 中華路商圈</option>
                  <option value="W">W 瑾園</option>
                  <option value="X">X 龍心百貨</option>
                  <option value="Y">Y 綠川</option>
                  <option value="Z">Z 濟生藥房</option>
                </select>
              </div>
              <div id="story-all-category" class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary">
                  <input type="radio" name="options" id="option2" autocomplete="off" value="call">招喚
                </label>
                <label class="btn btn-primary">
                  <input type="radio" name="options" id="option3" autocomplete="off" value="assist">協助
                </label>
                <label class="btn btn-primary">
                  <input type="radio" name="options" id="option4" autocomplete="off" value="leave">離開
                </label>
                <label class="btn btn-primary">
                  <input type="radio" name="options" id="option5" autocomplete="off" value="test">考驗
                </label>
                <label class="btn btn-primary">
                  <input type="radio" name="options" id="option6" autocomplete="off" value="crisis">危機
                </label>
                <label class="btn btn-primary">
                  <input type="radio" name="options" id="option7" autocomplete="off" value="treasure">寶藏
                </label>
              </div>
            </div>
          </div>
          <div>
            <form action="<?=site_url('Story/upt_db_story')?>" method="POST">
              <input type="hidden" id="story-ch" name="story_ch" value="A">
              <input type="hidden" id="story-name" name="story_name" value="st_call">
              <h2>故事內容：</h2>
              <textarea class="form-control" id="story-content" rows="9" name="story_content" placeholder="故事內容空白" required></textarea>
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