<?php
function userLogin(){
    echo <<<EOP
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <!-- 设置文本编码 -->
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <!-- 设置浏览器对最新和html5属性的支持 -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <!-- 检测显示器窗口大小 禁止浏览器初始缩放-->
    <meta name="keywords" content="">
    <!-- 设置网站关键字关键字 -->
    <meta name="description" content="">
    <!-- 网站描述 -->
    <link rel="stylesheet" href="./css/main.css">
    <!-- 主css接入 -->
    <link rel="stylesheet" href="./css/normalize.css">
    <!-- 网页标签初始化css接入 -->
    <!-- <link rel="stylesheet" href="http://cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.css"> -->
    <link rel="stylesheet" href="./css/font-awesome-4.4.0/css/font-awesome.min.css">
    <!-- font-awesome接入 -->
    <title>登陆</title>
    <!-- 网站标题 -->
</head>
<body>
<div class="site_top ">
    <div class="site_top_left">
        <a class="welcome" href="#"><i class="fa fa-home"></i> 欢迎光临XX箱包店铺</a>
    </div>
    <!-- 顶部栏左侧 -->
    <div class="site_top_right">
        <ul class="site_top_right_follow">
            <li class="site_top_right_follow_item">关注我们：</li>
            <li class="site_top_right_follow_item"><a href="#" class="item" title="Weibo 新浪微博"><i class="fa fa-weibo"></i></a></li>
            <li class="site_top_right_follow_item"><a href="#" class="item" title="Wechat 微信"><i class="fa fa-weixin"></i></a></li>
            <li class="site_top_right_follow_item"><a href="#" class="item" title="Twitter 推特"><i class="fa fa-twitter"></i></a></li>
            <li class="site_top_right_follow_item"><a href="#" class="item" title="Google+ 谷歌加"><i class="fa fa-google-plus"></i></a></li>
            <li class="site_top_right_follow_item"><a href="#" class="item" title="Facebook 脸书"><i class="fa fa-facebook"></i></a></li>
        </ul>
        <!-- 关注我们的社交网络 -->
    </div>
    <!-- 顶部栏右侧 -->
</div>
<!-- 顶栏完结 -->
<div class="container page_body">
    <nav class="nav">
        <div class="nav_logo"><a href="#" title="箱包官网"></a></div>
        <!-- 导航栏logo/标志 -->
        <ul class="nav_list">
            <li class="nav_list_item"> <a href="#">小米背包</a></li>
            <li class="nav_list_item"> <a href="#">小米箱包</a></li>
            <li class="nav_list_item"> <a href="#">箱包配件</a></li>
            <li class="nav_list_item"> <a href="#">客户服务</a></li>
            <li class="nav_list_item"> <a href="#">商务合作</a></li>
        </ul>
        <!-- 导航栏选项 -->
        <div class="nav_search">
            <form id="searchForm" class="" action="" method="get">
                <label for="search" class="hide">站内搜索</label>
                <input class="nav_search_input" type="search" id="search" name="keyword" autocomplete="off">
                <button type="submit"> <i class="fa fa-search"></i></button>
            </form>
        </div>
        <!-- 导航栏搜索框 -->
    </nav>

    <!-- 导航完结 -->

    <div class="login_box">
        <h1>登陆</h1>
        <form action="doLogin.php" method="post">
            <label>帐号</label>
            <input type="text"  name="username" placeholder="管理员帐户" class="input"><br>
            <label>密码</label>
            <input type="password" placeholder="密码" name="password" class="input"><br>
            <label>验证码</label>
            <input type="text" name="verify" placeholder="请输入图片中的数字" class="input"><br>
            <img src="getVerify.php" alt="" id="verify" onclick="document.getElementById('verify').src='getVerify.php'"/>
            <a href="javascript:void(0)" onclick="document.getElementById('verify').src='getVerify.php'">看不清 </a>
            <input type="checkbox" id="a1" class="checked checkbox" name="autoFlag" value="1" ><label for="a1" class="checkbox">  一周免登陆</label><br>
            <input type="submit" value="登陆" class="btn btn-small">
        </form>
    </div>

</div>
<!-- 首页主体完结 -->

<footer class="footer " id="footer">
    <ul class="footer_svc container">
        <li><a href="#" title="service"><i class="fa fa-suitcase"></i> 24小时极速发货</a></li>
        <li><a href="#" title="service"><i class="fa fa-credit-card"></i> 支持信用卡支付</a></li>
        <li><a href="#" title="service"><i class="fa fa-gift"></i> 全球快运速达</a></li>
        <li><a href="#" title="service"><i class="fa fa-thumb-tack"></i> 优质售后服务</a></li>
    </ul>
    <div class="footer_links">
        <dl class="col-links">
            <dt>帮助中心</dt>
            <dd><a href="#" rel="nofollow">购物指南</a></dd>
            <dd><a href="#" rel="nofollow">购物指南</a></dd>
            <dd><a href="#" rel="nofollow">购物指南</a></dd>
        </dl>
        <dl class="col-links">
            <dt>服务支持</dt>
            <dd><a href="#" rel="nofollow">售后支持</a></dd>
            <dd><a href="#" rel="nofollow">售后支持</a></dd>
            <dd><a href="#" rel="nofollow">售后支持</a></dd>
        </dl>
        <dl class="col-links">
            <dt>宝箱之家</dt>
            <dd><a href="#" rel="nofollow">服务网点</a></dd>
            <dd><a href="#" rel="nofollow">服务网点</a></dd>
            <dd><a href="#" rel="nofollow">服务网点</a></dd>
        </dl>
        <dl class="col-links">
            <dt>关于我们</dt>
            <dd><a href="#" rel="nofollow">了解宝箱</a></dd>
            <dd><a href="#" rel="nofollow">了解宝箱</a></dd>
            <dd><a href="#" rel="nofollow">了解宝箱</a></dd>
        </dl>
        <dl class="col-links">
            <dt>友情链接</dt>
            <dd><a href="http://www.leridy.pw">Leridy</a></dd>
            <dd><a href="http://www.leridy.pw">Leridy</a></dd>
            <dd><a href="http://www.leridy.pw">Leridy</a></dd>
        </dl>
        <div class="footer_contact">
            <p class="phone">400-888-8888</p>
            <p>周一至周日 8:00-18：00</p>
            <p>（仅收市话费）</p>
            <a href="#" class="btn btn-small">
                <i class="fa fa-commenting-o"></i>
                24小时在线客服
            </a>
        </div>
    </div>
    <!-- 底部链接结束 -->
    <div class="site_info container-inside">
        <a href="#" class="copyright" title="copyright">&copy; 2015 XX箱包商城 ALL Rights Reserved</a> | 网站技术支持：<a href="http://www.leridy.pw" title="技术支持"><i class="fa fa-cogs"></i> Leridy Group</a> | ICP备案：<a href="http://www.beian.gov.cn" title="备案">鄂ICP备100888888</a>
    </div>
    <!-- 网站信息结束 -->
</footer>
<!-- 底部结束 -->
</body>
</html>
EOP;
}