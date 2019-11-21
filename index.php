<?php
    session_start();
	include("include/util.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="css/header.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/share.css">
	<link href="css/footer.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<?php include("header.php");?>
<!--Display the current page-->
	<div id="border">
        <div id="con">
            <a class="a1" href="index.php">Home</a>
        </div>
    </div>
<!-- <hr> -->
<!-- banner -->
	<div id="banner">
		<div id="container">
			<div id="banner-info">
				<h1>Free Online Swapping</h1>
				<h2>Exchange your idles</h2>
				<div id="wmuSliderWrapper">
					<article style="position: absolute; width: 100%; opacity: 100;"> 
						<div id="banner-wrap">
							<div id="banner-info1">
								<p>Clothing + Makeups + Accessories + Shoes + Electronic product + Household appliances + Luggage + Maternal baby + Books + Games + Furniture</p>
							</div>
						</div>
					</article>
				</div>
				
			</div>
		</div>
	</div>
<!-- //banner -->
<?php include("footer.html"); ?>
</body>
</html>