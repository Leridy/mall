<?php
/**
 * 后台首页文件
 */
require_once '../include.php';
if(checkAdminLogined()) {
	//重定向浏览器
	header("Location: signin.html");
	//确保重定向后，后续代码不会被执行
	exit;
}elseif(isset($_REQUEST["page"])&&$_REQUEST["page"]=="logout"){
	require_once '../include.php';
	logout();
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title>Dashboard Template for Bootstrap</title>

	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/dashboard.css" rel="stylesheet">

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
	<script src="js/ie-emulation-modes-warning.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="../js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><?php echo "IDEAL PRINTER PARTS" ?></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">首页</a></li>
				<li><a href="#">设置</a></li>
				<li><a href="index.php?page=logout">注销</a></li>
				<li><a href="#">帮助</a></li>
			</ul>
			<form class="navbar-form navbar-right">
				<input type="text" class="form-control" placeholder="Search...">
			</form>
		</div>
	</div>
</nav>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li class="active"><a href="#one" data-toggle="tab">首页</a></li>
				<li><a href="#two" data-toggle="tab">订单</a></li>
				<li><a href="#three" data-toggle="tab">产品</a></li>
				<li><a href="#four" data-toggle="tab">用户</a></li>
			</ul>
		</div>

		<div class="tab-content col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="tab-pane active" id="one">
				<h1 class="page-header">one</h1>
			</div>

			<div class="tab-pane" id="two"><h1 class="page-header">two</h1>Lorem ipsum dolor sit amet, consectetur
				adipisicing elit. Aperiam asperiores culpa, cumque deleniti eius excepturi illum iure maiores molestias nemo
				nesciunt perspiciatis quae reiciendis reprehenderit tempora voluptatem voluptatum? Exercitationem, quia.
			</div>

			<div class="tab-pane" id="three">
				<h1 class="page-header">three</h1>

				<!-- 面板 -->
				<div class="panel panel-default">

					<!-- 面板头 -->
					<div class="panel-heading">
						<button class="btn btn-default" onclick="getProducts();">刷新</button>
						<button class="btn btn-default">创建商品</button>
					</div>

					<!-- 产品表格 -->
					<table class="table table-hover table-striped">
						<thead>
						<tr>
							<th>商品号</th>
							<th>名称</th>
							<th>编号</th>
							<th>现价</th>
							<th>原价</th>
							<th>库存</th>
							<th>详情</th>
							<th>上架</th>
						</tr>
						</thead>
						<tbody id="tab">
						</tbody>
					</table>

					<!--面板尾-->
					<div class="panel-footer">
						<!--翻页-->
						<nav>
							<ul class="pagination">
								<li>
									<a href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
								</li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li>
									<a href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="four"><h1 class="page-header">four</h1>Lorem ipsum dolor sit amet, consectetur
				adipisicing elit. Aspernatur, commodi dolore fuga in incidunt laborum maiores minima minus nam nihil, porro
				quae repellendus rerum sint tenetur ullam, veritatis. Magni, tempora.</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>

<script>
	function drawTable(data){
		$("#tab").append("\
        <tr>\
          <td>"+data['id']+"</td>\
          <td>"+data['productName']+"</td>\
          <td>"+data['sn']+"</td>\
          <td>"+data['nowPrice']+"</td>\
          <td>"+data['fillPrice']+"</td>\
          <td>"+data['num']+"</td>\
          <td>\
            <button class=\"btn btn-success btn-sm\">修改</button>\
          </td>\
        <td>上架</td>\
        </tr>");
	}

	function drawTables(data){
		$("#tab").empty();
		for(var i=0;i<data.length;i++){
			drawTable(data[i]);
		}
	}

	function getProducts() {
		$.ajax({
			type: "GET",
			url: "product.server.php",
			dataType: "json",
			success: function (data) {
				drawTables(data);
			},
			error: function (jqXHR) {
				alert("发生错误：" + jqXHR.status);
			}
		});
	}

	//初始化
	$(document).ready(getProducts());
</script>
</body>
</html>

