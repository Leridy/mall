<?php

/**
 * 检查用户是否存在
 * @param string $sql
 * @return string
 */
function checkUser($sql){
    return fetchOne($sql);
}
/**
 * 检测是否有用户登录.
 * @return bool
 */
function checkUserSignIn(){
    if(!isset($_SESSION['userId'])&&!isset($_COOKIE['userId'])){
        return false;
    }else{
        return true;
    }
}

/**
 * 注销用户
 */
function userLogout(){
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if(isset($_COOKIE['userId'])){
        setcookie("userId","",time()-1);
    }
    if(isset($_COOKIE['userName'])){
        setcookie("userName","",time()-1);
    }
    session_destroy();
    header("location:index.php");
}
