<?php
session_start();
include("include/util.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="css/header.css" rel="stylesheet">
	<link href="css/footer.css" rel="stylesheet">
	<link href="css/form.css" rel="stylesheet">
</head>
<body>
<?php include("header.php");?>
<hr>
<!-- login -->
<div id="content">
	<form method="post" action="login.php" enctype="multipart/form-data">

        <h1 id="htitle">Login Form</h1>
        <p id="p1">Items with <span>*</span> sign are required entries</p>

        <div id="form">
            <label for="email"><span>*</span>  Email</label><input type="email"  placeholder="Email Address" name="email" required="required"/><br />
            <label for="password"><span>*</span>  Password</label><input type="password" placeholder="Password" name="password" required="required"/><br />
        </div>

        <div>
            <input id="submit" name="submit" type="submit" value="Submit" />
        </div>
        <br />

        <!--qq等第三方登录-->
        <div>
            <img src="images/qq.png" alt="image for qq" height="50" width="50" /><a href="#"></a>
            <img src="images/wangyi.png" alt="image for wangyi" height="50" width="50" /><a href="#"></a>
            <img src="images/gmail.jpeg" alt="image for gmail" height="50" width="50" /><a href="#"></a>
            <img src="images/QuickLogin.png" alt="Quick Login" height="50" width="200" />
        </div>
</div>
<!-- //login -->
<?php include("footer.html"); ?>
</body>
</html>