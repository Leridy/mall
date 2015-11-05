<?php
require_once '../include.php';
header("Content-Type: application/json;charset=utf-8");
if(isset($_POST['productId'])){
    $id=$_POST['productId'];
    $myPro = new product();
    $myPro->setId($id);
    $arr=$myPro->deleteProduct();
    echo json_encode($arr);
}