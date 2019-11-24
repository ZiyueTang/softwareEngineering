<?php

session_start();
include("include/util.php");
if ( isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] ) {
    header("Location: logined.php");
}
else {
    $email = htmlspecialchars($_POST["email"]);
    if ( empty($email) || bad_login($email) ) {
        header("Location: error.php?type=login1");
        die();
    }
    $password = htmlspecialchars($_POST["password"]);
    if ( empty($password) || bad_password($email,$password) ) {
        header("Location: error.php?type=login2");
        die();
    }
    $_SESSION["loggedin"] = true;
    $_SESSION["email"] = $email;
    header("Location: index.php");
}

?>