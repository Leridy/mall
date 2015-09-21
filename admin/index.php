<?php
/**
 * 后台首页文件
 */
require_once '../include.php';
if(!checkLogined()) {
?>
<!doctype html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>后台面板</title>
	<link rel="stylesheet" type="text/css" href="../css/normalize.css"/>
	<link rel="stylesheet" href="css/style.css">
	<!--[if IE]>
	<script src="js/html5shiv.min.js"></script>
	<![endif]-->
</head>
<body>
<div class="container">
	<header class="header">
		<h1>后台面板 <span>xxx公司</span></h1>
	</header>
	<div class="container pb30">
		<div class="clear-backend">
			<div class="avatar">
				<div>
					<a href="#" target="_blank">
						<img src="img/admin.png" alt="">
					</a>
				</div>
			</div>

			<!-- tab-menu -->
			<input type="radio" class="tab-1" name="tab" checked="checked">
			<span>主页</span>

			<input type="radio" class="tab-2" name="tab">
			<span>产品</span>

			<input type="radio" class="tab-3" name="tab">
			<span>用户</span>

			<input type="radio" class="tab-4" name="tab">
			<span>交易</span>

			<input type="radio" class="tab-5" name="tab">
			<span>资料</span>

			<input type="radio" class="tab-6" name="tab">
			<span>新闻</span>

			<input type="radio" class="tab-7" name="tab">
			<span>图片</span>

			<input type="radio" class="tab-8" name="tab">
			<span>统计</span>

			<input type="radio" class="tab-9" name="tab">
			<span>反馈</span>

			<input type="radio" class="tab-10" name="tab">
			<span>设置</span>

			<!-- tab-top-bar -->
			<div class="top-bar">
				<ul>
					<li>
						<a href="login.php?logout=true" title="注销登陆">
							<span>注销登陆</span>
						</a>
					</li>
					<li>
						<a href="" title="消息">
							<span>消息</span>
						</a>
					</li>
				</ul>
			</div>

			<!-- tab-content -->
			<div class="tab-content">
				<section class="tab-item-1">
					<h1>One</h1>
				</section>
				<section class="tab-item-2">
					<h1>Two</h1>
				</section>
				<section class="tab-item-3">
					<h1>Three</h1>
				</section>
				<section class="tab-item-4">
					<h1>Four</h1>
				</section>
				<section class="tab-item-5">
					<h1>Five</h1>
				</section>
				<section class="tab-item-6">
					<h1>Six</h1>
				</section>
				<section class="tab-item-7">
					<h1>Seven</h1>
				</section>
				<section class="tab-item-8">
					<h1>Eight</h1>
				</section>
				<section class="tab-item-9">
					<h1>Nine</h1>
				</section>
				<section class="tab-item-10">
					<h1>Ten</h1>
				</section>
			</div>
		</div>
	</div>

</body>
</html>
<?php
}else{
	//重定向浏览器
	header("Location: login.php");
//确保重定向后，后续代码不会被执行
	exit;
}