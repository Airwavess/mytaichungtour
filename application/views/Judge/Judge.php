<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href=<?=base_url('assets/css/css.css')?>>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript">
		var star=document.getElementsByTagName('li');
		var clickStar=false;
		var numOfStar=-1;
		$(document).ready(function() {
			$('#star-list>li').hover(function() {
				var waitIndex=$("li").index(this);
				currentStar(waitIndex);
			},function() {
				clear();
				currentStar(numOfStar);
			})

			$('#star-list>li').click(function() {
				clear();
				numOfStar=$("#star-list>li").index(this);
				currentStar(numOfStar);
				$('#star_value').val(numOfStar+1);
			})
		})
		function clear() {
			for (var i=0;i<=5;i++) {
				$(star[i]).css('background-image','url(<?=base_url('assets/img/star.png')?>)');
			}
		}
		function currentStar(indexOfStar) {
			for (var i=0;i<=indexOfStar;i++) {
				$(star[i]).css('background-image','url(<?=base_url('assets/img/starfill.png')?>)');
			}
		}
	</script>
</head>
<body>

<div>
	
	<div id="list">
		<form action=<?=site_url('Judge/inst_cont')?> method="POST" accept-charset="utf-8">
			<ul id="star-list">
				<li id="star-five"></li>
				<li id="star-five"></li>
				<li id="star-five"></li>
				<li id="star-five"></li>
				<li id="star-five"></li>
				<input type="hidden" name="star_value" id="star_value" value="0">
			</ul>
			<div id="text-board">
				<textarea class="form-control" rows="3" name="judge_content"></textarea>
			</div>
			<div id="submit">
				<input type="submit" class="btn btn-default">
			</div>
		</form>
	</div>
	<div id="ju-content">
		<?php foreach($content as $row) {?>
			<div class="content">
				<ul class="">
					<?php for($i=1;$i<=$row['JU_NUMOFSTAR'];$i++) {?>
						<li id="five-fill-star"></li>
					<?php }?>
				</ul>
				<div>
					<p><?=$row['JU_CONTENT']?></p>
				</div>
			</div>
		<?php }?>
	</div>
	
</div>
</body>
</html>