
<div id="header">
	<div id="container">
		<div id="header-grid">
			<div id="header-grid-left">
				<ul> 
					<?php
					if(isset($_SESSION["loggedin"])){
						$email = $_SESSION["email"];
						$firstname = get_firstname($email);
						$username = get_username($email);
						$folder = dbpath();
						$file = "$folder/pic/$email.jpg"; ?>
						<li><h2>Welcome <?=$username?></h2></li>
						<!--<li><img src="<?=$file?>"/></li>-->
						<li><a href="logout.php">Logout</a></li>
					<?php }
					else{ ?>
						<li><a href="login_form.php">Login</a></li>
						<li><a href="register_form.php">Register</a></li>
					<?php }
					?>
				</ul>
			</div>
			</br>
		</div>
		<div id="menu">
			<div id="menu_left">
				<h1 id="h1"><a href="index.php">Leisure Fish <span>Exchange your idles</span></a></h1>
			</div>
			
			<div id="menu_grid">
				<ul>
					<li><a href="index.php"><strong>HOME</strong></a></li>
					<li><a href="products.php"><strong>PRODUCTS</strong></a></li>
					<li><a href="cart.php"><strong>CART</strong></a></li>
					<li><a href="my_products.php"><strong>MY PRODUCTS</strong></a></li>
				</ul>
			</div>

			<div id="menu_right">
				<img src="images/individual.png" alt="image for individual"><a href="personal.php">Individual</a>
			</div>
		</div>

	</div>
</div>