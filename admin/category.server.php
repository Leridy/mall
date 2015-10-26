<?php
require_once '../include.php';
header("Content-Type: application/json;charset=utf-8");
$myCategory=new category();
$arr=$myCategory->getAllCategory();
echo json_encode($arr);