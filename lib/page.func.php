<?php

function showHeader($title){
    if(checkUserLogin()){
        $hide1="hide";
        $hide2="";
    }else{
        $hide1="";
        $hide2="hide";
    }
?>
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
    <?php echo "<title>{$title} - {$GLOBALS['brand']}</title>" ?>
    <!-- 网站标题 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="site_top ">
    <div class="site_top_left">
        <a class="welcome" href="#"><i class="fa fa-home"></i> Welcome to <?php echo "{$GLOBALS['brand']}"; ?> shop</a>
    </div>
    <!-- 顶部栏左侧 -->
    <div class="site_top_right">
        <ul class="userinfo">
            <!-- 用户信息 -->
            <li class="userinfo_item <?php echo $hide2; ?>" id="login"><a href="index.php?page=login" title="login"><i class="fa fa-user"></i> Login</a></li>
            <!-- 无登陆情况下 登陆按钮 通过hide类控制显示-->
            <li class="userinfo_item <?php echo $hide2; ?>" id="reg"><a href="index.php?page=reg" title="login"><i class="fa fa-sign-in"></i> Join Us</a></li>
            <!-- 无登陆情况下 注册按钮 通过hide类控制显示-->
            <li class="userinfo_item <?php echo $hide1; ?>" id="face"><img src="getFace.php" alt="Userhead" id="logo"></li>
            <!-- 用户头像 -->
            <li class="userinfo_item <?php echo $hide1; ?>" id="username">
                <a href="#" id="name" title="<?php echo "{$_SESSION['userName']}"; ?>">
                    <?php echo "{$_SESSION['userName']}"; ?>
                </a>
            </li>
            <!-- 用户名 -->
            <li class="userinfo_item " id="cart"><a href="#" title="shopping cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
            <!-- 购物车 -->
            <li class="userinfo_item <?php echo $hide1; ?> id="logout"><a href="index.php?page=logout" title="sign out"><i class="fa fa-sign-out"></i> Exit</a></li>
            <!-- 退出 -->
        </ul>
    </div>
    <!-- 顶部栏右侧 -->
</div>
<!-- 顶栏完结 -->
<div class="page_body">
    <nav class="nav container-inside">
        <div class="nav_logo"><a href="#" title="HOME PAGE"> </a></div>
        <!-- 导航栏logo/标志 -->
        <ul class="nav_list">
            <li class="nav_list_item"> <a href="#">Home</a></li>
            <li class="nav_list_item aChild"> <a href="#">Products</a>
                <ul class="nav_list_child">
                    <li class="child_item"><a href="#">Prints</a></li>
                    <li class="child_item"><a href="#">Prints Parts</a></li>
                    <li class="child_item"><a href="#">Prints Parts</a></li>
                    <li class="child_item"><a href="#">Prints Parts</a></li>
                    <li class="child_item"><a href="#">Prints Parts</a></li>
                </ul>
            </li>
            <li class="nav_list_item"> <a href="#">Sell Items</a></li>
            <li class="nav_list_item"> <a href="#">Top Selling</a></li>
            <li class="nav_list_item"> <a href="#">New Arrivals</a></li>

        </ul>
        <!-- 导航栏选项 -->
        <div class="nav_search">
            <form id="searchForm" class="" action="" method="get">
                <label for="search" class="hide">站内搜索</label>
                <input class="nav_search_input" type="search" id="search" name="keyword" autocomplete="off" placeholder="Search...">
                <button type="submit"> <i class="fa fa-search"></i></button>
            </form>
        </div>
        <!-- 导航栏搜索框 -->
    </nav>
    <!-- 导航完结 -->
<?php
}
function showLogin(){
?>
    <div class="login_box">
			<h1>Login</h1>
			<form action="doLogin.php" method="post">
				<label>帐号</label>
				<input type="text"  name="username" placeholder="Username or Email Address" class="input"><br>
				<label>密码</label>
				<input type="password" placeholder="Password" name="password" class="input"><br>
				<label>验证码</label>
				<input type="text" name="verify" placeholder="Verification Code Below" class="input"><br>
				<img src="getVerify.php" alt="" id="verify" onclick="document.getElementById('verify').src='getVerify.php'"/>
				<a href="javascript:void(0)" onclick="document.getElementById('verify').src='getVerify.php'">Unclear?</a>
				<input type="checkbox" id="a1" class="checked checkbox" name="autoFlag" value="1"><label for="a1" class="checkbox">  Log in a week</label><br>
				<input type="submit" value="LOGIN" class="btn btn-small">
			</form>
		</div>
<?php
}
function showFooter(){
?>
    </div>
    <!-- 首页主体完结 -->

    <footer class="footer " id="footer">
        <ul class="footer_svc container">
            <li><i class="fa fa-suitcase"></i> 24 Hours Rapid Delivery</li>
            <li><i class="fa fa-credit-card"></i> Pay By Credit Card</li>
            <li><i class="fa fa-globe"></i> Global Express</li>
            <li><i class="fa fa-thumb-tack"></i> Good Service</li>
        </ul>
        <div class="footer_links">
            <dl class="col-links">
                <dt>Help Center</dt>
                <dd><a href="#" rel="nofollow">Shopping Guilding</a></dd>
                <dd><a href="#" rel="nofollow">Shopping Guilding</a></dd>
                <dd><a href="#" rel="nofollow">Shopping Guilding</a></dd>
            </dl>
            <dl class="col-links">
                <dt>Support</dt>
                <dd><a href="#" rel="nofollow">After-sales Service</a></dd>
                <dd><a href="#" rel="nofollow">After-sales Service</a></dd>
                <dd><a href="#" rel="nofollow">After-sales Service</a></dd>
            </dl>
            <dl class="col-links">
                <dt>Home Of Us</dt>
                <dd><a href="#" rel="nofollow">Shipping FAQ</a></dd>
                <dd><a href="#" rel="nofollow">Shipping FAQ</a></dd>
                <dd><a href="#" rel="nofollow">Shipping FAQ</a></dd>
            </dl>
            <dl class="col-links">
                <dt> Policy</dt>
                <dd><a href="#" rel="nofollow">Privacy Policy</a></dd>
                <dd><a href="#" rel="nofollow">Privacy Policy</a></dd>
                <dd><a href="#" rel="nofollow">Privacy Policy</a></dd>
            </dl>
            <dl class="col-links">
                <dt>Links</dt>
                <dd><a href="http://www.leridy.pw">Leridy</a></dd>
                <dd><a href="http://www.leridy.pw">Leridy</a></dd>
                <dd><a href="http://www.leridy.pw">Leridy</a></dd>
            </dl>
            <div class="footer_contact">
                <p class="phone">+086-027-8888888</p>
                <p>Monday~Sunday 8:00-18：00</p>
                <p>（UTC+8 Time Zone）</p>
                <a href="#" class="btn btn-small">
                    <i class="fa fa-commenting-o"></i>
                    Online Service
                </a>
            </div>
        </div>
        <!-- 底部链接结束 -->
        <div class="site_info container-inside">
            <a href="#" class="copyright" title="copyright">&copy; 2015 XX Mall ALL Rights Reserved</a> | Site Support：<a href="http://www.leridy.pw" title="技术支持"><i class="fa fa-cogs"></i> Leridy Group</a> | ICP：<a href="http://www.beian.gov.cn" title="备案">鄂ICP备100888888</a>
            <div class="site_info_right">
                <ul class="site_info_right_follow">
                    <li class="site_info_right_follow_item">Follow us：</li>
                    <li class="site_info_right_follow_item"><a href="#" class="item" title="Weibo 新浪微博"><i class="fa fa-weibo"></i></a></li>
                    <li class="site_info_right_follow_item"><a href="#" class="item" title="Wechat 微信"><i class="fa fa-weixin"></i></a></li>
                    <li class="site_info_right_follow_item"><a href="#" class="item" title="Twitter 推特"><i class="fa fa-twitter"></i></a></li>
                    <li class="site_info_right_follow_item"><a href="#" class="item" title="Google+ 谷歌加"><i class="fa fa-google-plus"></i></a></li>
                    <li class="site_info_right_follow_item"><a href="#" class="item" title="Facebook 脸书"><i class="fa fa-facebook"></i></a></li>
                </ul>
                <!-- 关注我们的社交网络 -->
            </div>
        </div>
        <!-- 网站信息结束 -->
    </footer>
    <!-- 底部结束 -->
    </body>
    <!-- javascript 引入 -->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">

    </script>
</html>
<?php
}
function page($filename){
    $handle  =  fopen ( $filename ,  "r" );
    echo $contents  =  fread ( $handle ,  filesize ( $filename ));
    fclose ( $handle );
}