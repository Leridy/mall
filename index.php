<?php
/**
 * 入口文件
 */
require_once './include.php';

$GLOBALS['brand']="Brand";



//注销
if($_REQUEST['page']=='signout') {
    //echo 'userLogout()';
    userLogout();
}
if(!checkUserSignIn()) {
//已登录用户
    if($_REQUEST['page']=='home'){
        showHeader("My Home");
        showUserHome();
        showFooter();
    }elseif($_FILES) {
        $upload = new upload("file" , "face");
        $upload->uploadFace();
        header("local:index.php");
    }else{
        showHeader("Index");
        if ($_REQUEST['keyword']) {
            showSearch();
        } else {
            showHome();
        }
        showFooter();
        exit;
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
    showHeader("Index");
    if($_REQUEST['keyword']){
        showSearch();
    }else{
        showHome();
    }
    showFooter();
}
