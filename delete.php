<?php
session_start();
include("include/util.php");
$folder = dbpath();

$email = $_GET[ "email" ];
$key = $_GET["key"];
$index = $_GET["index"];


$json_string = file_get_contents("$folder/json/$email.json");
$data = json_decode($json_string,true);
$key_pro = $data[$key];
array_splice($key_pro, $index,1);
$data[$key] = $key_pro;
	
$json_string = json_encode($data);
file_put_contents("$folder/json/$email.json", $json_string);
// if($key == "myproduct")
// 	header("Location:my_products.php");
// else if($key == "mycart")
// 	header("Location:cart.php");
 echo"<script>history.go(-1);</script>";
?>