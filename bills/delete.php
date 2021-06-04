<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: applicati on/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once('../config/db.php');
include_once('../model/bill.php');

$db = new db();
$conn = $db->connect();


$bill = new Bill($conn);

$data = json_decode(file_get_contents("php://input"));

if($data->ProductID === null || $data->ProductID === "")
{
    echo json_encode(array('message','ProductIDNull'));
}
else 
{
    $bill->ProductID = $data->ProductID;

    if($bill->delete()){
        echo json_encode(array('message','Bill Deleted'));
    }else {
        echo json_encode(array('message','Bill Not Deleted'));
    }
}
