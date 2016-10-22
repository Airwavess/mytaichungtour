<!DOCTYPE html>
<html>
<head>
	<title>新增故事</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href=<?=base_url('assets/css/story.css')?>>
	<script>
		$(document).ready(function(){
			$("#story-all-category>label>input").click(function(){
				$("#story-category").val($(this).val());
			})
		})
	</script>
</head>
<body>
<div class="col-md-5">
	<div>
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
	
	<div class="col-md-8">
		<form action= method="POST">
			<input type="text" id="story-category" name="story_id	" value="">
			<h2>故事名稱：</h2>
			<input type="text" class="form-control" placeholder="Text input">
			<h2>故事內容：</h2>
			<textarea class="form-control" rows="3"></textarea>
			<input class="btn btn-default" type="submit" value="Submit">
		</form>
	</div>
	
</div>
</body>
</html>