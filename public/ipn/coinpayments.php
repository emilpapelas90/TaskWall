<?php
session_start();

$merchant_id = 'da0b83b4d824daca50432157ff0d1b3d';
$secret = 'junglecashoutlootdevzstudio';

if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) {
  die("No HMAC signature sent");
}

$merchant = isset($_POST['merchant']) ? $_POST['merchant']:'';
if (empty($merchant)) {
  die("No Merchant ID passed");
}

if ($merchant != $merchant_id) {
  die("Invalid Merchant ID");
}

$request = file_get_contents('php://input');
if ($request === FALSE || empty($request)) {
  die("Error reading POST data");
}

$hmac = hash_hmac("sha512", $request, $secret);

if ($hmac != $_SERVER['HTTP_HMAC']) {
  die("HMAC signature does not match");
}


if($_POST['status'] == "1" || $_POST['status'] == "100"){
    $order_id = $_POST['item_number'];
   $data = file_get_contents("http://127.0.0.1:8000/api/funds/approve/qkfpwrjdbxy4/".$order_id);
}