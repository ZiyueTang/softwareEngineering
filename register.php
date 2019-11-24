<?php
include("include/util.php");
$username = htmlspecialchars($_POST["username"]);
if ( empty($username) ) {
    header("Location: error.php?type=username");
    die();
}
$firstname = htmlspecialchars($_POST["firstname"]);
if ( empty($firstname) ) {
    header("Location: error.php?type=firstname");
    die();
}
$lastname = htmlspecialchars($_POST["lastname"]);
if ( empty($lastname) ) {
    header("Location: error.php?type=lastname");
    die();
}
$birthday = htmlspecialchars($_POST["birthday"]);
if ( empty($birthday)) {
    header("Location: error.php?type=birth");
    die();
}
$logup = htmlspecialchars($_POST["email"]);
if ( empty($logup) || exit_login($logup)) {
    header("Location: error.php?type=logup");
    die();
}
$pwdup = htmlspecialchars($_POST["password"]);
if ( empty($pwdup) ) {
    header("Location: error.php?type=pwdup");
    die();
}
$cpwdup = htmlspecialchars($_POST["passwordConfirmation"]);
if(empty($cpwdup) || $cpwdup !== $pwdup){
    header("Location: error.php?type=cpwdup");
    die();
}

$folder = dbpath();
////defult pic
copy("images/photo.jpg","$folder/pic/$logup.jpg");

$data = array();
$data["username"] = $username;
$data["firstname"] = $firstname;
$data["lastname"] = $lastname;
$data["birthday"] = $birthday;

$data["email"] = $logup;
$data["password"] = $pwdup;

$json_string = json_encode($data);
file_put_contents("$folder/json/$logup.json",$json_string);

header("Location: login_form.php");
?>