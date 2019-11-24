<?php
session_start();
include("include/util.php");
check();
$email = $_SESSION["email"];
$firstname = get_firstname($email);
$lastname = get_lastname($email);
$username = get_username($email);
$birthday = get_birthday($email);
$password = get_password($email);
$folder = dbpath();
$file = "$folder/pic/$email.jpg";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Personal Profile</title>
    <link href="css/header.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
</head>

<body>
<?php include("header.php"); ?>
<hr>
<!--personal profile-->
<div id="content">
    <form method="post" action="change_personal.php" enctype="multipart/form-data">

        <h1 id="htitle">profile information</h1>

        <div id="form">
            <div>User Information</div>

            <label for="username">Username</label><input type="text" value="<?=$username?>" name="username"><br />
            <label for="firstname">Firstname</label><input type="text" value="<?=$firstname?>" name="firstname"><br />
            <label for="lastname">Lastname</label><input type="text" value="<?=$lastname?>" name="lastname"><br />
            <label for="birthday">Birthday</label><input type="date" value="<?=$birthday?>" name="birthday">
<!--            <br><br>-->
<!--            <label for="image">Image:</label><input id="image" name="image" type="file" accept=".jpg" >-->
<!--            <br><br>-->

            <div>Login Information</div>

            <label for="email">Email</label><input type="email" value="<?=$email?>" name="email" disabled="disabled">
            <label for="password">Password</label><input type="password" value="<?=$password?>" placeholder="New Password" name="password">
            <label for="passwordconfirmation">Password Confirm</label><input type="password" value="<?=$password?>" placeholder="New Password Confirmation" name="passwordConfirmation">
        </div>

        <div>
            <input id="submit" name="submit" type="submit" value="Change" />
        </div>
</div>
<!--personal profile-->
<!-- footer -->
<?php include("footer.html"); ?>
<!-- //footer -->
</body>
</html>
