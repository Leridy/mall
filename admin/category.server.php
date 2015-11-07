<?php
require_once '../include.php';
header("Content-Type: application/json;charset=utf-8");
$myCategory=new category();
if(isset($_POST['act'])){
    if(isset($_POST['id']))$myCategory->setId($_POST['id']);
    if(isset($_POST['categoryName']))$myCategory->setCategoryName($_POST['categoryName']);
    if(isset($_POST['CName']))$myCategory->setCName($_POST['CName']);
    switch($_POST['act']){
        case 'create': $myCategory->insertCategory();break;
        case 'update': $myCategory->updateCategory();break;
        case 'delete': $myCategory->deleteCategory();break;
    }
}
$arr=$myCategory->getAllCategory();
echo json_encode($arr);