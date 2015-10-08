<?php
/**
 * 管理员函数文件
 */

/**
 * 检查管理员是否存在
 * @param string $sql
 * @return string
 */
function checkAdmin($sql){
	return fetchOne($sql);
}
/**
 * 检测是否有管理员登陆.
 * @return bool
 */
function checkAdminLogined(){
	if($_SESSION['adminId']==""&&$_COOKIE['adminId']==""){
		return true;
	}else{
		return false;
	}
}

/**
 * 注销管理员
 */
function logout(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	if(isset($_COOKIE['adminId'])){
		setcookie("adminId","",time()-1);
	}
	if(isset($_COOKIE['adminName'])){
		setcookie("adminName","",time()-1);
	}
	session_destroy();
	header("location:index.php");
}
