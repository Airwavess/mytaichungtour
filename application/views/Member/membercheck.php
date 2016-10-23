<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table class="table table-striped" border="5px">
		<tr>
			<th>id</th>
			<th>Name</th>
			<th>Email</th>
			<th>Cellphone</th>
			<th>Account</th>
			<th>Password</th>
			<th>New</th>
			<th>Fix</th>
			<th>Del</th>
		</tr>
		<tr>
			<td>0</td>
			<td>1</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
			<td>5</td>
			<td>6</td>
			<td>7</td>
			<td>8</td>
		</tr>
	</table>
	<form action="<?=site_url('Member/insert')?>" method="POST">
		<p>姓名：<input type="text" name="name" value=""></p>
		<p>手機：<input type="text" name="cellphone" value=""></p>
		<p>帳號：<input type="text" name="account" type="email" maxlength="120" value=""></p>
		<p>密碼：<input type="text" name="password" type="password" value=""></p>
		<p><button type="submit" class="btn btn-default">註冊</button></p>
	</form>
	

	<!-- <p>姓名：<input type="text" name="Name" value=""></p>
	<p>電子郵件：<input type="text" name="Email" value=""></p>
	<p>手機：<input type="text" name="Cellphone" value=""></p>
	<p>帳號：<input type="text" name="Account" value=""></p>
	<p>密碼：<input type="text" name="Password" value=""></p>
	<p><button type="submit" class="btn btn-default">修改</button></p>

	<p>姓名：<input type="text" name="Name" value=""></p>
	<p>電子郵件：<input type="text" name="Email" value=""></p>
	<p>手機：<input type="text" name="Cellphone" value=""></p>
	<p>帳號：<input type="text" name="Account" value=""></p>
	<p>密碼：<input type="text" name="Password" value=""></p>
	<p><button type="submit" class="btn btn-default">刪除</button></p>

	<p>姓名：<input type="text" name="Name" value=""></p>
	<p>電子郵件：<input type="text" name="Email" value=""></p>
	<p>手機：<input type="text" name="Cellphone" value=""></p>
	<p>帳號：<input type="text" name="Account" value=""></p>
	<p>密碼：<input type="text" name="Password" value=""></p>
	<p><button type="submit" class="btn btn-default">查詢</button></p> -->
</body>
</html>