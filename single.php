<?php
    session_start();
	include("include/util.php");
    $eml = $_GET["eml"];
    $pro_id = $_GET["pro_id"];
    $my_cate = $_GET["cate"];
    $content = file_get_contents("database/json/$eml.json");
    $json = json_decode($content);
    $myproduct = $json->myproduct;
    $this_pro="";#to save the product of being selected.
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Single</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/share.css">
    <link rel="stylesheet" type="text/css" href="css/products.css">
    <link rel="stylesheet" type="text/css" href="css/single.css">
    <script src="js/single.js"></script>
    <script src="js/products.js"></script>
</head>
<body>
    <?php include("header.php");?>

    <div id="border">
        <div id="con">
            <a class="a1" href="index.php">Home</a>
            <a class="a2">&nbsp;&nbsp;/&nbsp;&nbsp;Single&nbsp;Page</a>
        </div>
    </div>

    <div class="products">
        <div id="content">
            <div class="products-left">
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

            <div class="single-right">
                <div class="single-right-left">
                    <div id="slideshow">
                    <?php
                        foreach($myproduct as $pro){
                            if($pro->pro_id == $pro_id){
                                $this_pro = $pro;
                                $images = $pro->image;
                                foreach($images as $img){?>
                                    <img src="<?= $img?>" alt="">
                    <?php       }
                    ?>
                        <p id="img_count"><?= count($images) ?></p>
                    <?php       }
                        }
                    ?>
                    </div>
                </div>
                <div class="single-right-right">
                    <h3><?= strtoupper($this_pro->pro_name)?></h3>
                    <div class="description">
                        <h5><i>Quantity</i></h5>
                        <p><?= $this_pro->quantity?></p>
                        <h5><i>Change Into</i></h5>
						<p>I'd like to swap my <?= $this_pro->pro_name?> for <?= $this_pro->change_into?></p>
						<h5><i>Description</i></h5>
						<p><?= $this_pro->description?></p>
                        <h5><i>Email</i></h5>
                        <p><?= $eml?></p>
                        <img src="images/contact.png" alt="image for contact" height="30" width="30" /><a href="#"></a>
                        <div class="single-add">
                            <form method="post" action="add_cart.php" enctype="multipart/form-data"> 
                                <input id="email" type="text" name="email" value="<?= $eml?>" />
                                <input id="pro_id" type="text" name="pro_id" value="<?= $pro_id?>" />
                                <input id="pro_cate" type="text" name="pro_cate" value="<?= $my_cate?>" />
                                <div id="single-sm">
                                    <input id="submit" name="submit" type="submit" value="add to cart" />
                                </div>
                            </form>
                         </div>
					</div>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.html"); ?>
</body>
<html>