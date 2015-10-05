<?php
/**
 * 头文件
 */

header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
session_start();
require_once 'lib/mysql.func.php';
require_once 'lib/image.func.php';
require_once 'lib/string.func.php';
require_once "configs/configs.php";
require_once 'admin/admin.func.php';
require_once 'lib/user.func.php';
require_once 'lib/page.func.php';
require_once 'lib/upload.class.php';
require_once 'lib/upload.func.php';
require_once 'lib/product.class.php';
require_once 'lib/category.class.php';