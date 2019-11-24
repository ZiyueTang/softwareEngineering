<?php
	session_start();
	include("include/util.php");
	
	$type = $_GET["type"];
	if ( $type === "login1" ) {
		$message = "Your email  is incorrect";
		$action = "login_form.php";
	} elseif ( $type === "login2" ) {
		$message = "Your  password is incorrect";
		$action = "login_form.php";
	} elseif ( $type === "firstname" ) {
		$message = "First name is incorrect";
		$action = "register_form.php";
	} elseif ( $type === "lastname" ) {
		$message = "Last name is incorrect";
		$action = "register_form.php";
	} elseif ( $type === "logup" ) {
		$message = "Email is incorrect";
		$action = "register_form.php";
	} elseif ( $type === "pwdup" ) {
		$message = "Password is incorrect";
		$action = "register_form.php";
	} elseif ($type === "cpwdup"){
        $message = "Password confirmation is incorrect";
        $action = "register_form.php";
    } elseif ($type === "birth"){
        $message = "Your birthday is empty";
        $action = "register_form.php";
    } elseif ($type === "username"){
        $message = "Your user-name is empty";
        $action = "register_form.php";
    } else { # type === nologin
		$message = "You must login to use Leisure Fish";
		$action = "login_form.php";
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>error</title>
		<meta charset="utf-8" />
		<link href="css/error.css" type="text/css" rel="stylesheet" />
  </head>
<body>
	<div id="content">
		<form method="get" action="<?=$action?>">
			<div id="error">
				<div><?= $message ?></div>
				<input class="button" type="submit" value="OK" />
			</div>
		</form>
    </div>
</body>
</html>