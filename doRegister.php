<?php
/**
 * 用户注册文件
 */
require_once './include.php';
$username=$_POST['username'];
$username=addslashes($username);
$password=md5($_POST['password']);
$email=addslashes($_POST['email']);
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
//if($verify==$verify1){
if(true){
    $sql="INSERT INTO ".DB_DBNAME.".user ( `username`, `password`,  `email`) VALUES ('{$username}', '{$password}','{$email}');";
    if(mysql_query($sql)){
        echo '注册成功，<a href="index.php">返回首页</a>';
    }else{
        echo '注册失败，<a href="index.php?page=login">重新注册</a>';
    }
}else{
    echo '验证码错误，<a href="index.php?page=login">重新注册</a>';
}
unset($_SESSION['verify']);