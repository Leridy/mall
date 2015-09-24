<?php
/**
 * 入口文件
 */
require_once './include.php';
//注销
if($_REQUEST['logout']) {
    echo 'userLogout()';
    userLogout();
}
if(!checkUserLogin()) {
//已登录用户
    echo <<< EOP
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
u have login<br><a href="index.php?logout=true">logout</a>
</body>
</html>
EOP;
    exit;
}else{
//未登录
    //登录
    if($_REQUEST['login']){
        echo 'userLogin()';
        userLogin();
        exit;
    }
}
//userLogin();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
u have not <a href="index.php?login=true">login</a>
</body>
</html>