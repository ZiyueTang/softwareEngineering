<?php
session_start();
include("include/util.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link href="css/header.css" rel="stylesheet">
	<link href="css/footer.css" rel="stylesheet">
	<link href="css/form.css" rel="stylesheet">
</head>
	
<body>
<?php include("header.php");?>
<hr>
<!-- register -->
<div id="content">
	<form method="post" action="register.php" enctype="multipart/form-data">
        <h1 id="htitle">Register Form</h1>
        <p id="p1">Items with <span>*</span> sign are required entries</p>
        <div id="form">
            <h1 id="htitle">profile information</h1>

            <label for="username"><span>*</span> Username</label><input type="text" placeholder="User Name" name="username" required="required" ><br />
            <label for="firstname"><span>*</span> Firstname</label><input type="text" placeholder="First Name..." name="firstname" required="required" ><br / >
            <label for="lastname"><span>*</span> Lastname</label><input type="text" placeholder="Last Name..." name="lastname" required="required" ><br / >
            <label for="birthday"><span>*</span> Birthday</label><input type="date" value="1996-01-01" name="birthday" required="required">
            <br><br>

            <h1 id="htitle">login information</h1>

            <label for="email"><span>*</span> Email</label><input type="email" placeholder="Email Address" name="email" required="required" ><br / >
            <label for="password"><span>*</span> Password</label><input type="password" placeholder="Password" name="password" required="required" ><br / >
            <label for="passwordconfirm"><span>*</span> Password Confirm</label><input type="password" placeholder="Password Confirmation" name="passwordConfirmation" required="required" ><br / >
        </div>

        <div>
            <input id="submit" name="submit" type="submit" value="Register" />
        </div>
</div>
<!-- //register -->
<?php include("footer.html"); ?>
</body>
</html>