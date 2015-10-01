<?php

function showHeader($title){
    if(checkUserSignIn()){
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
        <a class="welcome" href="index.php"><i class="fa fa-home"></i> Welcome to <?php echo "{$GLOBALS['brand']}"; ?> shop</a>
    </div>
    <!-- 顶部栏左侧 -->
    <div class="site_top_right">
        <ul class="userinfo">
            <!-- 用户信息 -->
            <li class="userinfo_item <?php echo $hide2; ?>" id="signin"><a href="index.php?page=signin" title="Sign In"><i class="fa fa-user"></i> Sign In</a></li>
            <!-- 无登陆情况下 登陆按钮 通过hide类控制显示-->
            <li class="userinfo_item <?php echo $hide2; ?>" id="signup"><a href="index.php?page=signup" title="Sign In"><i class="fa fa-sign-in"></i> Sign Up</a></li>
            <!-- 无登陆情况下 注册按钮 通过hide类控制显示-->
            <li class="userinfo_item <?php echo $hide1; ?>" id="face"><img src="getFace.php" alt="Userhead" id="logo"></li>
            <!-- 用户头像 -->
            <li class="userinfo_item <?php echo $hide1; ?>" id="username">
                <a href="index.php?page=home" id="name" title="<?php echo "{$_SESSION['userName']}"; ?>">
                    <?php echo "{$_SESSION['userName']}"; ?>
                </a>
            </li>
            <!-- 用户名 -->
            <li class="userinfo_item " id="cart"><a href="#" title="shopping cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
            <!-- 购物车 -->
            <li class="userinfo_item <?php echo $hide1; ?> id="signout"><a href="index.php?page=SignOut" title="sign out"><i class="fa fa-sign-out"></i> Sign Out</a></li>
            <!-- 退出 -->
        </ul>
    </div>
    <!-- 顶部栏右侧 -->
</div>
<!-- 顶栏完结 -->
<div class="page_body">
    <nav class="nav container-inside">
        <div class="nav_logo"><a href="index.php" title="HOME PAGE"> </a></div>
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
function showSignIn(){
?>
    <div class="login_box">
			<h1>Sign In</h1>
			<form action="doSignIn.php" method="post">
				<label>帐号</label>
				<input type="text"  name="username" placeholder="Username or Email Address" class="input"><br>
				<label>密码</label>
				<input type="password" placeholder="Password" name="password" class="input"><br>
				<label>验证码</label>
				<input type="text" name="verify" placeholder="Verification Code Below" class="input"><br>
				<img src="getVerify.php" alt="" id="verify" onclick="document.getElementById('verify').src='getVerify.php'"/>
				<a href="javascript:void(0)" onclick="document.getElementById('verify').src='getVerify.php'">Unclear?</a>
				<input type="checkbox" id="a1" class="checked checkbox" name="autoFlag" value="1"><label for="a1" class="checkbox">  Sign in a week</label><br>
				<input type="submit" value="Sign In" class="btn btn-small">
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
                <dt>Home of Us</dt>
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
                <p>China Mainland</p>
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
function showRegister(){
?>
    <div class="login_box">
        <h1>Register</h1>
        <form action="doSignUp.php" method="post">
            <label>用户名</label>
            <input type="text"  name="username" placeholder="Username" class="input username"><span class="check no"></span><br>
            <!-- username 通过 ok 和 no控制验证提示 -->
            <label>密码</label>
            <input type="password" placeholder="Password" name="password" class="input password1"><span class="check weak"></span><span class="required">Required</span><br>
            <!-- password1 通过 strong 和 weak 控制验证提示 -->
            <label>确认密码</label>
            <input type="password" placeholder="Confirm Your Password" name="password2" class="input password2"><span class="check no"></span><span class="required">Required</span><br>
            <!-- password2 通过 ok 和 no 控制验证提示 -->
            <label>email</label>
            <input type="email" placeholder="Your Email Address" name="email" class="input email"><span class="check no"></span><span class="required">Required</span><br>
            <!-- email 通过 ok 和 no 和 exist 控制验证提示 -->
            <label>验证码</label>
            <input type="text" name="verify" placeholder="Verification Code Below" class="input verifycode"><span class="check no"></span><span class="required">Required</span><br>
            <!-- verifycode通过 ok 和 no 控制验证提示 -->
            <img src="getVerify.php" alt="" id="verify" onclick="document.getElementById('verify').src='getVerify.php'"/>
            <a href="javascript:void(0)" onclick="document.getElementById('verify').src='getVerify.php'">Unclear?</a>
            <input type="submit" value="REGISTER" class="btn btn-small">
        </form>
    </div>

<?php
}
function page($filename){
    $handle  =  fopen ( $filename ,  "r" );
    echo $contents  =  fread ( $handle ,  filesize ( $filename ));
    fclose ( $handle );
}
function showHome(){
?>
    <div class="container">
        <ul class="products">
            <header>
                <h2 class="title left">Printers</h2>
                <a href="#" class="more right" title="More Printers">More <i class="fa fa-angle-right"></i></a>
            </header>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
        </ul>
    </div>
    <!-- 一号 展示单完结 -->
    <div class="container">
        <ul class="products">
            <header>
                <h2 class="title left">Printers</h2>
                <a href="#" class="more right" title="More Printers">More <i class="fa fa-angle-right"></i></a>
            </header>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
        </ul>
    </div>
    <!-- 二号 展示栏完结 -->
    <div class="container">
        <ul class="products">
            <header>
                <h2 class="title left">Printers</h2>
                <a href="#" class="more right" title="More Printers">More <i class="fa fa-angle-right"></i></a>
            </header>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
        </ul>
    </div>
    <!-- 三号 展示栏完结 -->
    <div class="container">
        <ul class="products">
            <header>
                <h2 class="title left">Printers</h2>
                <a href="#" class="more right" title="More Printers">More <i class="fa fa-angle-right"></i></a>
            </header>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
        </ul>
    </div>
    <!-- 四号 展示栏完结 -->
<?php
}
function showSearch(){
?>
    <div class="breadcrumbs container">
        <a href="#" title="Home">Home</a>
        <a href="#" title="All Result">All Result</a>
        <a href="#" title="Printers">Printers</a>
    </div>
    <!-- 面包屑导航完结 -->
    <div class="filter_box container-inside">
        <div class="filter_list_wrap">
            <dl class="filter_list">
                <dt>Item:</dt>
                <dd class="active"><a href="#">ALL</a></dd>
                <dd><a href="#">HP</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <a href="#" class="more">more <i class="fa fa-angle-down"></i></a>
            </dl>
        </div>
        <div class="filter_list_wrap">
            <dl class="filter_list">
                <dt>Model:</dt>
                <dd class="active"><a href="#">ALL</a></dd>
                <dd><a href="#">HP</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <a href="#" class="more">more <i class="fa fa-angle-down"></i></a>
            </dl>
        </div>
        <div class="filter_list_wrap">
            <dl class="filter_list">
                <dt>Brand:</dt>
                <dd class="active"><a href="#">ALL</a></dd>
                <dd><a href="#">HP</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <dd><a href="#">hp</a></dd>
                <a href="#" class="more">more <i class="fa fa-angle-down"></i></a>
            </dl>
        </div>

        <!-- 选项栏结束 排序选项栏在下-->
        <div class="view_filter">
            <a href="#">Order <i class="fa fa-sort-numeric-asc"></i></a>
            <a href="#">New <i class="fa fa-sort-numeric-asc"></i></a>
            <a href="#">Price <i class="fa fa-sort-numeric-desc"></i></a>
            <a href="#"><input type="checkbox">Free Shipping</a>
        </div>
    </div>
    <!-- 排序选项栏结束 下位搜索结果展示 -->
    <div class="container">
        <ul class="products result_list">
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
        </ul>

        <!-- 搜索结果 一栏 展示栏完结 -->
        <ul class="products result_list">
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
        </ul>
        <!-- 搜索结果 二栏 展示栏完结 -->
        <ul class="products result_list">
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer1.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
        </ul>
        <!-- 搜索结果 三栏 展示栏完结 -->
        <ul class="products result_list">
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
            <li class="products_item"><a href="#" title="Prints"><img src="images/printer.jpg" alt="Prints" class="products_item_img"></a><span class="products_item_info">
					<a href="#" class="products_link">HP Printer</a>
					<p class="order">Order(2)</p>
					<p class="price"><strong>US $269</strong>/price</p>
				</span></li>
        </ul>
        <!-- 搜索结果 二栏 展示栏完结 -->

    </div>
    <!-- 搜索页展示完结 分页部分在下 -->
    <div class="page_label">
        <div class="page_label_label">
            <span class=""><i class="fa fa-angle-left"></i></span>
            <span class="numbers current">1</a></span>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">7</a>
            <a href="#">8</a>
            <span class="numbers">...</a></span>
            <a href="#"><i class="fa fa-angle-right"></i></a>
        </div>
        <!-- 普通分页选项部分 -->
        <div class="page_label_select">
            <h3 class="pagination">Pagination <i class="fa fa-sort"></i>
                <ul class="select_list">
                    <li class="child_item"><a href="#">1</a></li>
                    <li class="child_item"><a href="#">2</a></li>
                    <li class="child_item"><a href="#">3</a></li>
                    <li class="child_item"><a href="#">4</a></li>
                    <li class="child_item"><a href="#">5</a></li>
                    <li class="child_item"><a href="#">6</a></li>
                    <li class="child_item"><a href="#">7</a></li>
                    <li class="child_item"><a href="#">8</a></li>
                    <li class="child_item"><a href="#">9</a></li>
                    <li class="child_item"><a href="#">10</a></li>
                    <li class="child_item"><a href="#">11</a></li>
                    <li class="child_item"><a href="#">12</a></li>
                    <li class="child_item"><a href="#">13</a></li>
                    <li class="child_item"><a href="#">14</a></li>
                    <li class="child_item"><a href="#">16</a></li>
                    <li class="child_item"><a href="#">16</a></li>
                </ul>
            </h3>
        </div>
        <!-- 选择跳转分页部分 -->
    </div>
    <!-- 分页部分完结 -->
<?php
}
function showUserHome(){
?>
    <form  action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file"  multiple="multiple"/>
        <input type="submit" class="" value="上传" />
    </form>
<?php
}
