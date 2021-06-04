<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: applicati on/json;charset=utf-8');

include_once('./config/db.php');
include_once('./model/bill.php');

$db = new db();
$conn = $db->connect();


$bill = new Bill($conn);
$read = $bill->read();

$num = $read->rowCount();

if ($num > 0) {
  $bill_array = [];
  $bill_array['data'] = [];

  while ($row = $read->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $bill_item = array(
      'ProductID' => $ProductID,
      'ProductName' => $ProductName,
      'Manufacture' => $Manufacture,
      'ProductType' => $ProductType,
      'ProductImage' => $ProductImage,
      'Price' => $Price,
      'NumberCart' => $NumberCart
    );
    array_push($bill_array['data'], $bill_item);
  }
  echo json_encode($bill_array,JSON_UNESCAPED_UNICODE );
}
