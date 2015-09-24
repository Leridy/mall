<?php
/**
 * 登录验证文件
 */
require_once '../include.php';
$username=$_POST['username'];
$username=addslashes($username);
$password=md5($_POST['password']);
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
$autoFlag=$_POST['autoFlag'];
if($verify==$verify1){
	$sql="select * from admin where username='{$username}' and password='{$password}'";
	$row=checkAdmin($sql);
	if($row){
		//如果选了一周内自动登陆
		if($autoFlag){
			setcookie("adminId",$row['id'],time()+7*24*3600);
			setcookie("adminName",$row['username'],time()+7*24*3600);
		}
		$_SESSION['adminName']=$row['username'];
		$_SESSION['adminId']=$row['id'];
		echo "登陆成功";
		header("Location: index.php");
	}else{
		echo '登陆失败，<a href="login.html">重新登陆</a>';
	}
}else{
	echo '验证码错误，<a href="login.html">重新登陆</a>';
}
unset($_SESSION['verify']);