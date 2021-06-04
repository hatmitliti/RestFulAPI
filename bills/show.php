<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: applicati on/json');

include_once('../config/db.php');
include_once('../model/bill.php');

$db = new db();
$conn = $db->connect();


$bill = new Bill($conn);
$bill->MaHD =  isset($_GET['ProductID'])? $_GET['ProductID'] : die();
$bill->show();

$bill_item = array(
      'ProductID' => $bill->ProductID,
      'ProductName' => $bill->ProductName,
      'Manufacture' => $bill->Manufacture,
      'ProductType' => $bill->ProductType,
      'ProductImage' => $bill->ProductImage,
      'Price' => $bill->Price,
      'NumberCart' => $bill->NumberCart
  );
  print_r(json_encode($bill_item));

?>