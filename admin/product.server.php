<?php
require_once '../include.php';
header("Content-Type: application/json;charset=utf-8");
$myPro = new product();
$arr=$myPro->getAllProductArrayFromDatebase();
echo json_encode($arr);