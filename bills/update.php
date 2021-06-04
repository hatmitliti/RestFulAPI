<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: applicati on/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once('../config/db.php');
include_once('../model/bill.php');

$db = new db();
$conn = $db->connect();


$bill = new Bill($conn);
$data = json_decode(file_get_contents("php://input"));

$bill->ProductID = $data->ProductID;
$bill->ProductName = $data->ProductName;
$bill->Manufacture = $data->Manufacture;
$bill->ProductType = $data->ProductType;
$bill->ProductImage = $data->ProductImage;
$bill->Price = $data->Price;
$bill->NumberCart = $data->NumberCart;


if($bill->update()){
    echo json_encode(array('message','Bill Updated'));
}else {
    echo json_encode(array('message','Bill Not Updated'));
}
?>