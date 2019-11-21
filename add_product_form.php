<?php
session_start();
include("include/util.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/share.css">
	<link rel="stylesheet" type="text/css" href="css/my_products.css">
	<link rel="stylesheet" type="text/css" href="css/add_product_form.css">
</head>
<body>
	<?php include("header.php");?>

	<!--Display the current page-->
	<div id="border">
        <div id="con">
            <a class="a1" href="index.php">Home</a>
            <a class="a2" href="my_products.php">&nbsp;&nbsp;/&nbsp;&nbsp;My Products</a>
            <a class="a2">&nbsp;&nbsp;/&nbsp;&nbsp;Add Product</a>
        </div>
    </div>

    <!--add product form-->
    <div id="content">
    	<form method="post" action="add_product.php" enctype="multipart/form-data"> 

    	<h1 id="htitle">Add Product Here</h1>
    	<p id="p1">Items with <span>*</span> sign are required entries</p>
    	<div id="form">
    		<label for="category"><span>*</span> Category</label>
    		<select id="category" name="category">
    			<option value="clothing">Clothing</option>
    			<option value="makeups">Makeups</option>
    			<option value="accessories">Accessories</option>
    			<option value="shoes">Shoes</option>
    			<option value="electronic">Electronic product</option>
    			<option value="household">Household appliances</option>
    			<option value="luggage">Luggage</option>
    			<option value="maternal_baby">Maternal baby</option>
    			<option value="books">Books</option>
    			<option value="games">Games</option>
    			<option value="furniture">Furniture</option>
    			<option value="miscellaneous">Miscellaneous</option>
    		</select><br />
    		<label for="product_name"><span>*</span>  Product Name</label><input id="product_name" type="text" name="product_name" required="required" /><br />
    		<label for="quality"><span>*</span> Quantity</label><input id="quality" type="text" name="quality" oninput="value=value.replace(/[^\d]/g,'')" required="required" /><br />
    		<label for="change"><span>*</span> Change Into</label><input id="change" type="text" name="change" required="required" /><br />
    		<label for="description"><span>*</span> Product Description</label><textarea id="description" type="text" name="description" required="required"></textarea><br />
    		<label for="image[]"><span>*</span> Product Image <span id="warn">( You can only upload images in JPG format )</span></label><input id="image" type="file" accept=".jpg" name="image[]" required="required" multiple="multiple" /><br />
    	</div>
    	<div>
			<input id="submit" name="submit" type="submit" value="Submit" />
		</div>
    </div>

	<?php include("footer.html");?>
</body>
</html>