<?php
/**
 * 入口文件
 */
require_once './include.php';

$GLOBALS['brand']="Brand";



//搜索
if($_REQUEST['keyword']){
    showHeader($_REQUEST['keyword']);
    showSearch();
    showFooter();
    exit;
}
//已登录用户
if(!checkUserSignIn()) {
    //个人中心
    if($_REQUEST['page']=='home'){
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
    if($_REQUEST['page']=='signout') {
        userLogout();
    }
}else{
//未登录
    //登录
    if($_REQUEST['page']=='signin'){
        //echo 'userLogin()';
        showHeader("Sign In");
        showSignIn();
        showFooter();
        exit;
    }
    //注册
    if($_REQUEST['page']=='signup'){
        showHeader("Sign Up");
        showRegister();
        showFooter();
        exit;
    }
}
//首页
showHeader("Home");
showHome();
showFooter();
exit();
