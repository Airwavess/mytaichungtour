<!DOCTYPE html>
<html>
<head>
	<title>新增故事</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!-- <link rel="stylesheet" type="text/css" href=<?=base_url('assets/css/story.css')?>> -->
	<script>
		$(document).ready(function(){
			$("#story-all-category>label").click(function(){
				$("#story-category").val($(this).children().val());
				$.ajax({
		    		type: "POST",
		    		url: "<?=site_url('Story/sel_story')?>",
		   			dataType: "json",
		   			data: { 
		   				story_id: $(this).children().val()
		   			},
		      		success: function(data){
		            	$('#story_name').val(data.st_name);
		            	$('#story_content').val(data.st_content);
		   			},
		 			error: function(e,a,f){
		        		alert(f);
					}
				});
			})
		})
	</script>
</head>
<body>
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
                        更新故事
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div id="story-all-category" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-primary active">
                                        <input type="radio" name="options" id="option1" autocomplete="off" value="1" checked>現狀
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" id="option2" autocomplete="off" value="2">招喚
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" id="option3" autocomplete="off" value="3">協助
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" id="option4" autocomplete="off" value="4">離開
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" id="option5" autocomplete="off" value="5">考驗
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" id="option6" autocomplete="off" value="6">危機
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" id="option7" autocomplete="off" value="7">寶藏
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" id="option8" autocomplete="off" value="8">結局
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form action="<?=site_url('Story/upt_db_story')?>" method="POST">
                                <input type="hidden" id="story-category" name="story_id" value="1">
                                <h2>故事名稱：</h2>
                                <input type="text" id="story_name" name="story_name" class="form-control" placeholder="故事名稱空白" required>
                                <h2>故事內容：</h2>
                                <textarea class="form-control" id="story_content" rows="9" name="story_content" placeholder="故事內容空白" required></textarea><br>
                                <input class="btn btn-default" type="submit" value="Submit">
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
</body>
</html>