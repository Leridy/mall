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

    <link rel="stylesheet" href="css/createProduct.css">
</head>

<body>
<!--导航栏开始-->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
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
<!--导航栏结束-->
<!--主体开始-->
<div class="container-fluid">
    <div class="row">
        <!--选项卡开始-->
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#one" data-toggle="tab">首页</a></li>
                <li><a href="#two" data-toggle="tab">订单</a></li>
                <li><a href="#three" data-toggle="tab" onclick="getProducts()">商品</a></li>
                <li><a href="#four" data-toggle="tab">物流</a></li>
                <li><a href="#five" data-toggle="tab">统计</a></li>
                <li><a href="#six" data-toggle="tab">设置</a></li>
            </ul>
        </div>
        <!--选项卡结束-->

        <!--主内容开始-->
        <div class="tab-content col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <!--第1页-->
            <div class="tab-pane active" id="one">
                <h1 class="page-header">one</h1>
            </div>

            <!--第2页-->
            <div class="tab-pane" id="two">
                <div>
                    <h1 class="page-header">订单</h1>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">未发货</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">已发货</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">已完成</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">1</div>
                        <div role="tabpanel" class="tab-pane" id="profile">2</div>
                        <div role="tabpanel" class="tab-pane" id="messages">3</div>
                    </div>

                </div>
            </div>

            <!--第3页-->
            <div class="tab-pane" id="three">
                <h1 class="page-header">three</h1>

                <!-- 面板 -->
                <div class="panel panel-default">

                    <!-- 面板头 -->
                    <div class="panel-heading">
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class="active"><a href="#productList" aria-controls="productList" role="tab" data-toggle="tab">所有商品</a></li>
                            <li role="presentation"><a href="#createProduct" aria-controls="createProduct" role="tab" data-toggle="tab">创建商品</a></li>
                            <li role="presentation"><a href="#categoryManage" aria-controls="categoryManage" role="tab" data-toggle="tab">管理分类</a></li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <!-- 产品表格 -->
                        <div role="tabpanel" class="tab-pane active" id="productList">
                            <table class="table table-hover table-striped" id="productTable">
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
                                <nav id="productsTablePagination">
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

                        <!--创建产品-->
                        <div role="tabpanel" class="tab-pane" id="createProduct">
                            <form id="createProductForm" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">名称</span>
                                                    <input class="form-control" type="text" name="productName" value="product name" id="input-productName" placeholder="名称">
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">编号</span>
                                                    <input class="form-control" type="text" name="sn" id="input-sn" placeholder="编号">
                                                </div>
                                            </div>

                                            <div class="col-xs-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">现价</span>
                                                    <input class="form-control" type="text" name="nowPrice" id="input-nowPrice" placeholder="现价">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">原价</span>
                                                    <input class="form-control" type="text" name="fillPrice" id="input-fillPrice" placeholder="原价">
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">库存</span>
                                                    <input class="form-control" type="text" name="num" id="input-num" placeholder="库存">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">规格</span>
                                                    <input class="form-control" type="text" name="unitType" id="input-unitType" placeholder="规格">
                                                    <span class="input-group-addon">pieces / lot </span>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">重量</span>
                                                    <input class="form-control" type="text" name="weight" id="input-weight" placeholder="重量">
                                                    <span class="input-group-addon">kg</span>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon">尺寸</span>
                                                    <input class="form-control" type="text" name="sizeLong" id="input-sizeLong" placeholder="长">
                                                    <span class="input-group-addon">x</span>
                                                    <input class="form-control" type="text" name="sizeWidth" id="input-sizeWidth" placeholder="宽">
                                                    <span class="input-group-addon">x</span>
                                                    <input class="form-control" type="text" name="sizeHeight" id="input-sizeHeight" placeholder="高">
                                                    <label class="input-group-addon" for="unity">单位</label>
                                                    <select class="form-control input-group-addon" id="unity">
                                                        <option>cm </option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="input-group">
                                                    <label class="input-group-addon" for="category">分类</label>
                                                    <select class="form-control" id="category" name="category">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12">
                                                <label class="" for="description">商品详情</label>
                                                <textarea class="form-control" rows="8" id="description" name="description"></textarea>
                                            </div>
                                            <div class="col-xs-12">
                                                <div class="input-group">
                                                    <a class="btn btn-primary" id="createProductSubmit">确定</a>
                                                    <button class="btn btn-default">取消</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!--面板尾-->
                            <div class="panel-footer">
                                <!--创建产品工具按钮组-->
                                <div class="btn-group" role="group" id="productsTableBottom" style="display: inline-block;">
                                    <button type="button" class="btn btn-default">确认</button>
                                    <button type="button" class="btn btn-default">重置</button>
                                </div>
                            </div>
                        </div>

                        <!-- 分类管理 -->
                        <div role="tabpanel" class="tab-pane" id="categoryManage">
                            <h1>分类管理</h1>

                            <div class="row">
                                <div class="col-sm-12 col-md-5 categoryLeft">

                                    <div class="input-group">
                                        <span class="input-group-addon">添加分类</span>
                                        <input class="form-control" id="productName" type="text" name="productName" placeholder="分类名称">
                                        <span class="input-group-addon btn btn-default">添加</span>
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <table class="table table-hover table-striped" id="categoryTable">
                                        <thead>
                                        <tr>
                                            <th>分类编号</th>
                                            <th>分类名称</th>
                                        </tr>
                                        </thead>
                                        <tbody id="categoryTableBody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!--面板尾-->
                            <div class="panel-footer">
                                <!--创建产品工具按钮组-->
                                <div class="btn-group" role="group" id="productsTableBottom" style="display: inline-block;">
                                    <button type="button" class="btn btn-default">确认</button>
                                    <button type="button" class="btn btn-default">重置</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!--第4页-->
            <div class="tab-pane" id="four"><h1 class="page-header">物流</h1>Lorem ipsum dolor sit amet, consectetur
                adipisicing elit. Aspernatur, commodi dolore fuga in incidunt laborum maiores minima minus nam nihil, porro
                quae repellendus rerum sint tenetur ullam, veritatis. Magni, tempora.</div>

            <!--第5页-->
            <div class="tab-pane" id="five"><h1 class="page-header">统计</h1>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores necessitatibus saepe voluptas. Amet debitis
                dicta dolores laboriosam magnam nulla! Aperiam corporis dolorum excepturi, ipsam rem sint voluptatem? Eos, excepturi vero?
            </div>

            <!--第6页-->
            <div class="tab-pane" id="six"><h1 class="page-header">设置</h1>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi atque deleniti dicta dolor dolore
                ducimus enim, facilis ipsam necessitatibus nihil, obcaecati officiis quibusdam ratione repellat sit,
                tempore voluptates. Illo?
            </div>
        </div>
        <!--主内容结束-->
    </div>
</div>
<!--主体结束-->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="js/ie10-viewport-bug-workaround.js"></script>
<!--自定义js开始-->
<script>
    //商品提交按钮
    $("#createProductSubmit").click(function(){
        $.ajax({
            type: "POST",
            url: "createProduct.server.php",
            dataType: "json",
            data:{
                "act":"createProduct",
                "productName":$("#input-productName").val(),
                "sn":$("#input-sn").val(),
                "nowPrice":$("#input-nowPrice").val(),
                "fillPrice":$("#input-fillPrice").val(),
                "num":$("#input-num").val(),
                "unitType":$("#input-unitType").val(),
                "weight":$("#input-weight").val(),
                "input":$("#input-sizeLong").val(),
                "sizeWidth":$("#input-sizeWidth").val(),
                "sizeHeight":$("#input-sizeHeight").val(),
                "unity":$("#unity").val(),
                "category":$("#category").val(),
                "description":$("#description").val()
            },
            success: function (data) {

            },
            error: function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    });

    //绘制表格行
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
        </tr>\
        ");
     }
    //绘制表格
    function drawTables(data){
        $("#tab").empty();
        for(var i=0;i<data.length;i++){
            drawTable(data[i]);
        }
    }
    //获取商品
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

    //绘制单个分类选项
    function drawCategory(data){
        $("#category").append("<option value="+data['id']+">"+data['categoryName']+"</option>")
    }
    //绘制多个分类选项
    function drawCategories(data){
        for(var i=0;i<data.length;i++){
            drawCategory(data[i]);
        }
    }
    //绘制单个分类表格
    function drawCategoriesTable(data){
        for(var i=0;i<data.length;i++){
            drawCategoryTable(data[i]);
        }
    }
    //绘制多个分类表格
    function drawCategoryTable(data){
        $("#categoryTableBody").append("\
        <tr>\
            <td>"+data['id']+"</td>\
            <td>"+data['categoryName']+"</td>\
        </tr>\
        ")
    }

    //获取分类
    function getCategories() {
        $.ajax({
            type: "GET",
            url: "category.server.php",
            dataType: "json",
            success: function (data) {
                drawCategories(data);
                drawCategoriesTable(data);
            },
            error: function (jqXHR) {
                alert("发生错误：" + jqXHR.status);
            }
        });
    }
    //初始化
    $(document).ready(getCategories());
</script>
</body>
</html>
