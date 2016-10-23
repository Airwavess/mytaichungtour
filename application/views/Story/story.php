<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="col-lg-4">
	<form action="<?=site_url('Story/my_story')?>" method="POST">
		<h2>輸入英文名字</h2>
		<input type="text" class="form-control" name="user_name" placeholder="English name input"><br>
		<button type="submit" class="btn btn-primary">SUBMIT</button>
	</form>
</div>
</body>
</html>