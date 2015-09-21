<?php
/**
 * 登录文件
 */
require_once '../include.php';
if($_REQUEST["logout"]){
	logout();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登陆</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/normalize.css"/>
<!--[if IE]>
<script src="js/html5shiv.min.js"></script>
<![endif]-->
</head>

<body>
		<header>
			<h1>欢迎登陆</h1>
		</header>
		<form action="doLogin.php" method="post">
			<label>管理员帐号</label><br>
			<input type="text"  name="username" placeholder="请输入管理员帐号"><br>
			<label>密码</label><br>
			<input type="password" placeholder="请输入密码" name="password"><br>
			<label>验证码</label><br>
			<input type="text" name="verify" placeholder="请输入图片中的数字"><br>
			<img src="getVerify.php" alt="" id="verify" onclick="document.getElementById('verify').src='getVerify.php'"/>
			<a href="javascript:void(0)" onclick="document.getElementById('verify').src='getVerify.php'">看不清</a><br>
			<input type="checkbox" id="a1" class="checked" name="autoFlag" value="1"><label for="a1">自动登陆(一周内自动登陆)</label><br>
			<input type="submit" value="登陆">
		</form>
</body>
</html>