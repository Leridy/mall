<?php
require_once '../include.php';
header("Content-Type: application/json;charset=utf-8");
$myPro = new product();

if($_POST['act']=="createProduct"){
    $data=array('msg'=>0);
    foreach($myPro->data as $key => $value) {
        if( isset($_POST[$key])){
            //echo $data['$key'];
            //$data['msg']++;
            $data[$key]=$_POST[$key];
            //array_push( $data,$key => $value);
        }
    }

    //array_push( $data,'test','TEST');
    $myPro->setProduct($data);
    $data['msg']=$myPro->insertProduct();
    //$arr = $data;
    //$data['test']='TEST';
    echo json_encode($data);
}
