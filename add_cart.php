<?php
    session_start();
    include("include/util.php");
    
    if (isset($_SESSION["loggedin"])) {
        
        $email = $_SESSION["email"];

        $folder = dbpath();

        $eml = htmlspecialchars($_POST["email"]); #the email of this product
        $pro_id = htmlspecialchars($_POST["pro_id"]);
        $pro_cate = htmlspecialchars($_POST["pro_cate"]);

        $json_string = file_get_contents("$folder/json/$email.json");
        $data = json_decode($json_string,true);

		$msg = 2;
        if(isset($data["mycart"])){
            foreach($data["mycart"] as $cart){
                $cart_user = $cart["cart_user"];
                $cart_id = $cart["pro_id"];
    
                if($cart_user == $eml && $cart_id == $pro_id){
                    $msg = 0; #represent 'You added it to cart before. Please do not repeat!'
                    break;
                }
            }
            if($msg != 0){
                $cart = array();
                $cart["cart_user"] = $eml;
                $cart["pro_id"] = $pro_id;
                array_push($data["mycart"],$cart);
                $json_string = json_encode($data);
                file_put_contents("$folder/json/$email.json", $json_string);
                $msg = 1;#add successfully.
            }
        }
        else{
			$cart = array();
            $cart["cart_user"] = $eml;
            $cart["pro_id"] = $pro_id;
            $data["mycart"][0] = $cart;
			$json_string = json_encode($data);
            file_put_contents("$folder/json/$email.json", $json_string);
            $msg = 1;#add successfully.
        }     
        header("Location:products.php?success=$msg&cate=$pro_cate");
    }
    else{
        header("Location:error.php?type=nologin");
    }
?>