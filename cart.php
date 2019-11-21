<?php
session_start();
if (!isset($_SESSION["loggedin"])){
	header("Location:error.php?type=nologin");
}
include("include/util.php");
$folder = dbpath();
$email = $_SESSION["email"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Swapping Cart</title>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/share.css">
	<link rel="stylesheet" type="text/css" href="css/my_products.css">
	<script src="js/delete.js"></script>
</head>
<body>
	<?php include("header.php");?>
	<!--Display the current page-->
	<div id="border">
        <div id="con">
            <a class="a1" href="index.php">Home</a>
            <a class="a2">&nbsp;&nbsp;/&nbsp;&nbsp;Swapping Cart</a>
        </div>
    </div>
    <!--Table showing items -->
    <?php 
    $json_string = file_get_contents("$folder/json/$email.json");
	$data = json_decode($json_string,true);
    ?>
    <div id="checkout">
    	<div id="container">	
    		<h1 id="count">YOUR SWAPPING CART CONTAINS: <span id="num">
    			<?php if (isset($data["mycart"])) {
    				$num_pro = count($data["mycart"]);
    			}?> </span></h1>
			<table id="table">
				<thead>
					<tr>
						<th>SL No.</th>	
						<th>Product</th>
						<th>Quantity</th>
						<th>Product Name</th>
						<th>Product Owner</th>
						<th>E-Mail</th>
						<th>Remove</th>
					</tr>
				</thead>
				<?php 
				if(isset($data["mycart"])){
					// $num_pro = count($data["mycart"]);
					for($i = 0; $i < $num_pro;$i++){
						$product = $data["mycart"][$i];
						$cart_user = $product["cart_user"]; //e-mail
						$pro_id = $product["pro_id"];
						$pro_string = file_get_contents("$folder/json/$cart_user.json");
						$pro = json_decode($pro_string,true);
						$pro_s = $pro["myproduct"];
						// $quantity = "";
						// $pro_name = "";
						// $pro_img = "";
						foreach ($pro_s as $pro_u) {
							if(array_search($pro_id,$pro_u)){
								$quantity = $pro_u["quantity"];
								$pro_name = $pro_u["pro_name"];
								$pro_img = $pro_u["image"][0];
								$cate = $pro_u["category"]; ?>
						<tr id="<?= $i ?>">
						<td class="invert"><?= $i+1 ?></td>
						<?php $img = $pro_img;?>
						<td id="item_img"><a href="single.php?eml=<?= $cart_user?>&pro_id=<?= $pro_id?>&cate=<?= $cate?>"><img id="img" src="<?= $img?>" alt="product image"></a></td>
						<td class="invert"><?= $quantity ?></td>
						<td class="invert"><?= $pro_name ?></td>
						<td class="invert"><?= $pro["username"] ?></td>
						<td class="invert"><?= $cart_user ?></td>
						<td class="invert">
							<div id="rem">
								<div class="close" id="<?= $i ?>"> </div>
							</div>
						</td>
					</tr>
							<?php }
						}
				 }
				}?>
			</table>
    		
    	</div>
    </div>
    <input type="hidden" name="count" id="count" value="<?= $num_pro?>">
    <input type="hidden" name="email" id="email" value="<?= $email ?>">
    <input type="hidden" name="key" id="key" value="mycart">
	<?php include("footer.html");?>
</body>
</html>