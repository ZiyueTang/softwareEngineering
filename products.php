<?php
    session_start();
	include("include/util.php");
    $files = glob("database/json/*.json");
    $my_cate = isset($_GET[ "cate" ])?$_GET["cate"]:"All";
    $bydate = isset($_GET["bydate"])?$_GET["bydate"]:"false";
    $msg = isset($_GET["success"])?$_GET["success"]:2;
    if($msg == 0){
        echo "<script>alert('You added it to cart before. Please do not repeat!')</script>";
    }
    else if($msg == 1){
        echo "<script>alert('Add to cart successfully!')</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Products</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/share.css">
    <link rel="stylesheet" type="text/css" href="css/products.css">
    <script src="js/products.js"></script>
</head>
<body>
    <?php include("header.php");?>

    <div id="border">
        <div id="con">
            <a class="a1" href="index.php">Home</a>
            <a class="a2">&nbsp;&nbsp;/&nbsp;&nbsp;Products</a>
        </div>
    </div>

    <div class="products">
        <div id="content">
            <div class="products-left">
                <div class="sort">
                    <a href="products.php?cate=<?= $my_cate?>&bydate=true">Sort by date</a>
                </div>
                <div id="categories">
                    <p>CATEGORIES</p>
                    <ul>
                        <?php 
                            $category = array("All","Clothing","Furniture","Makeups","Accessories","Shoes","Electronic product",
                            "Household appliances","Luggage","Maternal baby","Books","Games","Miscellaneous");
                            foreach($category as $cate){
                                if(strtolower($cate) == strtolower($my_cate)){?>
                                    <a href="#"><li class="selected" name="<?= $cate ?>" onclick="remove_class(this)"><?= $cate ?></li></a>
                        <?php   }
                                else{?>
                                    <a href="#"><li name="<?= $cate ?>" onclick="remove_class(this)"><?= $cate ?></li></a>
                        <?php   }
                            }
                        ?>
                    </ul>
                </div>
            </div>
            
            <div class="products-right">
                <form action="#" method="get" style="float:right">
                    <input type="search" name="search1"/>
                    <input type="submit"  value="Search" style="color:#d8703f"/>
                 </form>
                <?php 
                    class jsondata{
                        public $pro = array();
                        public $eml = "";
                    }
                    $date = array();
                    $products = array();
                    foreach($files as $file){
                        $file_name = explode(".json",basename($file))[0];
                        $content = file_get_contents($file);
                        $json = json_decode($content);
                        if(array_key_exists('myproduct',$json)){
                            $myproduct = $json->myproduct;
                            foreach($myproduct as $pro){
                                $pro_eml = new jsondata();
                                $pro_eml->pro = $pro;
                                $pro_eml->eml = $file_name;
                                #echo json_encode($pro_eml);
                                $products[] = $pro_eml;
                            }
                        }
                    }
                   # echo json_encode($products);
                    foreach($products as $pro){
                        $date[] = $pro->pro->date;
                    }
                    if($bydate == "true"){
                        array_multisort($date,SORT_DESC,$products);
                    }
                    foreach($products as $pro){
                        if($my_cate == "All" || strtolower($pro->pro->category) == strtolower($my_cate)){?>
                            <div class="products-grid">
                                <img src="<?= $pro->pro->image[0]?>" alt=" ">
                                <div class="quickview">
                                    <a href="single.php?eml=<?= $pro->eml?>&pro_id=<?= $pro->pro->pro_id?>&cate=<?= $my_cate?>">Quick View</a>
                                </div>
                                <h4><?= $pro->pro->pro_name?></h4>
                                <p>I'd like to swap for <?= $pro->pro->change_into?></p>
                                <p>Quantity: <?= $pro->pro->quantity?></p>
                                <div class="add">
                                    <form method="post" action="add_cart.php" enctype="multipart/form-data"> 
                                        <input id="email" type="text" name="email" value="<?= $pro->eml?>" />
                                        <input id="pro_id" type="text" name="pro_id" value="<?= $pro->pro->pro_id?>" />
                                        <input id="pro_cate" type="text" name="pro_cate" value="<?= $my_cate?>" />
                                        <div id="sm">
                                            <input id="submit" name="submit" type="submit" value="add to cart" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                    <?php }}?>
            </div>
        </div>
    </div>

    <?php include("footer.html"); ?>
</body>
</html>