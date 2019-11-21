<?php 
session_start();
include("include/util.php");

if (isset($_SESSION["loggedin"])) {
	$email = $_SESSION["email"];
	$folder = dbpath();

	$pro_id = create_guid();
	$category = htmlspecialchars($_POST["category"]);
	$pro_name = htmlspecialchars($_POST["product_name"]);
	$quantity = htmlspecialchars($_POST["quality"]);
	$change_into = htmlspecialchars($_POST["change"]);
	$description = htmlspecialchars($_POST["description"]);
	$images = array();
	$i = 0;
	foreach ($_FILES['image']['tmp_name'] as $image) {
		$name = "images/products/$pro_id$i.jpg";
		$images[$i] = $name;
		move_uploaded_file($_FILES['image']['tmp_name'][$i], $name);
		$i++;
	}

	$now_time= time();
	$date= date('Y-m-d H:i:s',$now_time);
	
	$product = array();
	$product["pro_name"] = $pro_name;
	$product["pro_id"] = $pro_id;
	$product["date"] = $date;
	$product["quantity"] = $quantity;
	$product["category"] = $category;
	$product["change_into"] = $change_into;
	$product["description"] = $description;
	$product["image"] = $images;

	$json_string = file_get_contents("$folder/json/$email.json");
	$data = json_decode($json_string,true);
	if(!isset($data["myproduct"])){
		$data["myproduct"][0] = $product;
	}
	else {
		array_push($data["myproduct"],$product);
	}
 	$json_string = json_encode($data);
 	file_put_contents("$folder/json/$email.json", $json_string);

	header("Location:my_products.php");

}
?>