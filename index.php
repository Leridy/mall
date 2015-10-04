<?php
/**
 * 入口文件
 */
require_once './include.php';

$GLOBALS['brand']="Brand";



//搜索
if(isset($_REQUEST['keyword'])){
    showHeader($_REQUEST['keyword']);
    showSearch();
    showFooter();
    exit;
}
$page=isset($_REQUEST['page'])?$_REQUEST['page']:null;
//已登录用户
if(!checkUserSignIn()) {
    //个人中心
    if($page=='home'){
        showHeader("My Home");
        showUserHome();
        showFooter();
        exit();
    }
    //上传头像
    if($_FILES) {
        $upload = new upload("file" , "face");
        $upload->uploadFace();
        header("local:index.php");
    }
    //注销
    if($page=='signout') {
        userLogout();
    }
}else{
//未登录
    //登录
    if($page=='signin'){
        //echo 'userLogin()';
        showHeader("Sign In");
        showSignIn();
        showFooter();
        exit;
    }
    //注册
    if($page=='signup'){
        showHeader("Sign Up");
        showSignUp();
        showFooter();
        exit;
    }
}
//首页
showHeader("Home");
showHome();
showFooter();
exit();
