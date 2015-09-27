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
    showHeader("page");
    echo 'u have login<br><a href="index.php?page=logout">logout</a>';
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
}
showHeader("index");
echo 'u have not <a href="index.php?page=login">login</a>';
showFooter();