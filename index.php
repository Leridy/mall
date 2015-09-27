<?php
/**
 * 入口文件
 */
require_once './include.php';

$GLOBALS['brand']="Brand";

//注销
if($_REQUEST['page']=='logout') {
    //echo 'userLogout()';
    userLogout();
}
if(!checkUserLogin()) {
//已登录用户
    showHeader("Index");
    showHome();
    showFooter();
    exit;
}else{
//未登录
    //登录
    if($_REQUEST['page']=='login'){
        //echo 'userLogin()';
        showHeader("Login");
        showLogin();
        showFooter();
        exit;
    }
    //注册
    if($_REQUEST['page']=='register'){
        showHeader("Register");
        showRegister();
        showFooter();
        exit;
    }

}
showHeader("Index");
showHome();
showFooter();