<?php
/**
 * 页面文件
 */

/**
 * 显示头部页面
 * @param string
 */
function showHeader($title){
    if(checkUserSignIn()){
        $hide1="";
        $hide2="hide";
    }else{
        $hide1="hide";
        $hide2="";
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
            <li class="userinfo_item <?php echo $hide2; ?>" id="signup"><a href="index.php?page=signup" title="Sign Up"><i class="fa fa-sign-in"></i> Sign Up</a></li>
            <!-- 无登陆情况下 注册按钮 通过hide类控制显示-->
            <li class="userinfo_item <?php echo $hide1; ?>" id="face"><img src="<?php getFace(); ?>" alt="Userhead" id="logo"></li>
            <!-- 用户头像 -->
            <li class="userinfo_item <?php echo $hide1; ?>" id="username">
                <a href="index.php?page=home" id="name" title="<?php echo "{$_SESSION['userName']}"; ?>">
                    <?php echo "{$_SESSION['userName']}"; ?>
                </a>
            </li>
            <!-- 用户名 -->
            <li class="userinfo_item " id="cart"><a href="#" title="shopping cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
            <!-- 购物车 -->
            <li class="userinfo_item <?php echo $hide1; ?> id="signout"><a href="index.php?page=signout" title="sign out"><i class="fa fa-sign-out"></i> Sign Out</a></li>
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

/**
 * 显示登陆页面
 */
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

/**
 * 显示底部页面
 */
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

/**
 * 显示注册页面
 */
function showSignUp(){
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

/**
 * 打开文件
 * @param $filename
 */
function page($filename){
    $handle  =  fopen ( $filename ,  "r" );
    echo $contents  =  fread ( $handle ,  filesize ( $filename ));
    fclose ( $handle );
}

/**
 * 显示首页主体
 */
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

/**
 * 显示搜索页面
 */
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

/**
 * 显示用户个人中心页面
 */
function showUserHome(){
?>
    <form  action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file"  multiple="multiple"/>
        <input type="submit" class="" value="上传" />
    </form>
<?php
}

/**
 * 显示产品页面
 * @param int $id
 */
function showProduct($id){
    $sql="SELECT * FROM products WHERE id = '".$id."'";
    $data=fetchOne($sql);
    $id=$data['id'];
    $productName=$data['productName'];
    $brand=$data['brand'];
    $sn=$data['sn'];
    $num=$data['num'];
    $fillPrice=$data['fillPrice'];
    $nowPrice=$data['nowPrice'];
    $description=$data['description'];
    $publishTime=$data['publishTime'];
    $isShow=$data['isShow'];
    $isHot=$data['isHot'];
    $unitType=$data['unitType'];
    $weight=$data['weight'];
    $sizeLong=$data['sizeLong'];
    $sizeWidth=$data['sizeWidth'];
    $sizeHeight=$data['sizeHeight'];
    $sizeUnit=$data['sizeUnit'];
    $categoryId=$data['categoryId'];

    showHeader($productName);
    $cate=new category();
    $cate->setId($categoryId);
    $category=$cate->getCategoryName();
    print_r($data);
?>
    <div class="breadcrumbs container">
        <a href="#" title="Home">Home</a>
        <a href="#" title="Printers">Printers</a>
        <a href="#" title="<?php echo $category; ?>"><?php echo $category; ?></a>
        <a href="#" title=" <?php echo $productName; ?>"> <?php echo $productName; ?></a>
    </div>
    <!-- 面包屑导航完结 下面为商品详情部分-->
    <div class="detail_page container-inside">
        <div class="product_info">
            <div class="product_info_img" style="background-image:URL(./images/printer.jpg)"></div>
            <h1 class="product_info_name"><?php echo $productName ?></h1>
            <!-- 商品名 -->
            <div class="product_info_order">
					<span class="order_num">
						<strong>2</strong>
						orders</span>
            </div>
            <!-- 商品订购信息 -->
            <dl class="product_info_price">
                <dt>Price:</dt>
                <dd>
                    <div class="current_price">
                        <span class="unit">US$</span>
                        <!-- 价格单位 -->
                        <span class="price"><?php echo $nowPrice; ?></span>
                        <!-- 单件价格 -->
                        <span class="price_count">/lot</span>
                        <!-- 数量单位 -->
                        <div class="sub_info"><?php echo $unitType; ?> pieces/lot,US$ <?php echo $fillPrice/$unitType; ?> /piece</div>
                        <!-- 数量单位描述 -->
                    </div>
                </dd>
            </dl>
            <!-- 商品价格信息 -->
            <div class="product_info_order_option">
                <form action="" method="post" id="buy_now_form">
                    <label for="shipping">Shipping: </label>
                    <input type="text" class="hide country" name="country" value="">
                    <!-- 由JavaScript填入获取填入国家 默认隐藏-->
                    <input type="text" class="hide company" name="company" value="">
                    <!-- 由JavaScript填入获取填入快递公司 默认隐藏 -->
						<span class="shipping_cost">
							<span class="shipping_cost">Free Shipping</span>
							<span class="shipping_to">to</span>
						</span>
                    <a href="#" class="shipping_link">
                        <span class="shipping_country">United States</span>
                        <!-- 由JavaScript填入获取填入快递国家 -->
                        <span class="shipping_via">via</span>
                        <span class="shipping_company">ePacket</span>
                        <!-- 由JavaScript填入获取填入快递公司 -->
                    </a>
                    <div class="sub_info">Delivery: <span class="shipping_days">5-15</span> days (ships out within 6 business days)</div>
                    <!-- 邮递设置 -->
                    <label for="quantity:">Quantity: </label>
                    <input type="number" name="quantity" id="product_info_quantity" value="1" min="1" max="<?php echo $num; ?>" maxlength="5" autocomplete="off" placeholder=""><span class="sub_info"> lot (<?php echo $num; ?> lots available)</span>
                    <!-- 订单中物品数量 -->
                    <label for="TotalPrice">Total Price: </label>
                    <span class="unit">US$</span>
                    <span class="product_info_total_price"><?php echo $nowPrice; ?></span>
                    <div class="sub_info">Depends on the product properties you select and shipping fee</div>
                    <!-- 订单总价 -->
                    <a href="#" class="btn btn-small buy_now" > Buy Now</a> <a href="#" class="btn btn-small add_to_cart"> Add to Cart</a>
                    <!-- 立即购买和加入购物车按钮 -->
                    <div class="add_to_wish_list">
                        <a href="#" class="add_to_wish_list_link"> Add to Wish List</a><span class="sub_info"><strong class="wish_list_num">0</strong> adds</span>
                    </div>
                    <!-- 添加到心愿单 -->
                </form>
                <!-- 商品订购表单 -->
            </div>
            <!-- 订购信息表单完结 -->
            <div id="seller_promise_list">
                <dl class="return_policy">
                    <dt>Return Policy:</dt>
                    <dd>
                        <div class="return_policy_info">Returns accepted if product not as described, buyer pays return shipping fee; or keep the product & agree refund with seller. <a href="#" class="view_return_policy">View details </a></div>
                    </dd>
                </dl>
                <dl class="seller_guarantees">
                    <dt>Seller Guarantees:</dt>
                    <dd>
                        <div class="seller_guarantees_info">On-time Delivery <br/>27 days</div>
                    </dd>
                </dl>
            </div>
            <!-- 商家承诺和保证完结，保持静态输出 -->
            <div class="buyer_banner">
                <i class="fa fa-shield"></i>
                <span class="buyer_protection">Buyer Protection</span>
                <span class="buyer_protection_info"> Full Refund if you don't receive your order </span><span class="buyer_protection_info"> Refund or Keep items not as described</span>
                <a href="#" class="view_buyer_protection">Learn More </a>
            </div>
        </div>
        <!-- 商品信息完结 -->
    </div>
    <!-- 商品页上部分完成 -->
    <div class="detail_extend_main container">
        <div class="detail_nav_tab">
            <input type="radio" name="nav_tab" id="nav_tab_item_1" class="nav_tab_item" checked>
            <a href="#" class="nav_tab_link" id="nav_tab_link_1">Product Details</a>
            <input type="radio" name="nav_tab" id="nav_tab_item_2" class="nav_tab_item">
            <a href="#" class="nav_tab_link" id="nav_tab_link_2">Feedback</a>
            <input type="radio" name="nav_tab" id="nav_tab_item_3" class="nav_tab_item">
            <a href="#" class="nav_tab_link" id="nav_tab_link_3">Shipping and Payment</a>
            <input type="radio" name="nav_tab" id="nav_tab_item_4" class="nav_tab_item">
            <a href="#" class="nav_tab_link" id="nav_tab_link_4">Seller Guarantees</a>
            <div id="detail_viewport">
                <div id="detail_info">
                    <div class="detail_info_item" id="detail_info_1">
                        <div class="info_box">
                            <h2>Item Specifics</h2>
                            <div class="infos">
                                <dl>
                                    <dt>Brand Name:</dt>
                                    <dd><?php echo $brand ?></dd>
                                </dl>
                                <dl>
                                    <dt>Model Number:</dt>
                                    <dd><?php echo $sn ?></dd>
                                </dl>
                                <dl>
                                    <dt>Type:</dt>
                                    <dd>other</dd>
                                </dl>
                                <dl>
                                    <dt>is_customized:</dt>
                                    <dd>Yes</dd>
                                </dl>

                            </div>
                        </div>
                        <div class="info_box">
                            <h2>Product Description</h2>
                            <div class="infos">
                                <p><?php echo $description; ?></p>
                            </div>
                        </div>
                        <div class="info_box">
                            <h2>Packaging Details</h2>
                            <div class="infos">
                                <dl>
                                    <dt>Unit Type:</dt>
                                    <dd>lot (<?php echo $unitType ?> pieces/lot)</dd>
                                </dl>
                                <dl>
                                    <dt>Package Weight:</dt>
                                    <dd><?php echo $weight ?>kg (<?php echo number_format($weight*2.20462262,2,'.','') ?>lb.)</dd>
                                </dl>
                                <dl>
                                    <dt>Package Size:</dt>
                                    <dd><?php echo $sizeLong."cm x ".$sizeWidth."cm x ".$sizeHeight."cm (". number_format(0.393700788*$sizeLong,2,'.','')."in x ". number_format(0.393700788*$sizeWidth,2,'.','')."in x ". number_format(0.393700788*$sizeHeight,2,'.','')."in)"; ?></dd>
                                </dl>

                            </div>
                        </div>
                    </div>
                    <div class="detail_info_item" id="detail_info_2">
                        Feedback
                    </div>
                    <div class="detail_info_item" id="detail_info_3">
                        Shipping and Payment
                    </div>
                    <div class="detail_info_item" id="detail_info_4">
                        Seller Guarantees
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}