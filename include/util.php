<?php
function dbpath() {
    return "database";
}

function check() {
    if ( ! isset($_SESSION["loggedin"]) || ! $_SESSION["loggedin"] ) {
        header("Location: error.php?type=nologin");
        die();
    }
}

function bad_login($email) {
    $folders = glob(dbpath()."/json/*");
    foreach ($folders as $folder){
        if($email === basename($folder,".json"))
            return false;
    }
    return true;
}

function exit_login($email) {
    $folders = glob(dbpath()."/json/*");
    foreach ($folders as $folder){
        if($email === basename($folder,".json"))
            return true;
    }
    return false;
}

function bad_password($email,$password) {
    $json_string = file_get_contents(dbpath()."/json/$email.json");
    $data = json_decode($json_string,true);
    return $password != $data["password"];
}

function get_password($email) {
    $json_string = file_get_contents(dbpath()."/json/$email.json");
    $data = json_decode($json_string,true);
    return $data["password"];
}

function get_firstname($email) {
    $json_string = file_get_contents(dbpath()."/json/$email.json");
    $data = json_decode($json_string,true);
    return $data["firstname"];
}

function get_lastname($email) {
    $json_string = file_get_contents(dbpath()."/json/$email.json");
    $data = json_decode($json_string,true);
    return $data["lastname"];
}

function get_birthday($email) {
    $json_string = file_get_contents(dbpath()."/json/$email.json");
    $data = json_decode($json_string,true);
    return $data["birthday"];
}

function get_username($email) {
    $json_string = file_get_contents(dbpath()."/json/$email.json");
    $data = json_decode($json_string,true);
    return $data["username"];
}

// Generate a unique ID for a commodity
function create_guid($namespace = '') { 
    static $guid = '';
    $uid = uniqid("", true);
    $data = $namespace;
    $data .= $_SERVER['REQUEST_TIME'];
    $data .= $_SERVER['HTTP_USER_AGENT'];
    // $data .= $_SERVER['LOCAL_ADDR'];
    // $data .= $_SERVER['LOCAL_PORT'];
    $data .= $_SERVER['REMOTE_ADDR'];
    $data .= $_SERVER['REMOTE_PORT'];
    $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
    $guid = 
      substr($hash, 0, 8) .
      '-' .
      substr($hash, 8, 4) .
      '-' .
      substr($hash, 12, 4) .
      '-' .
      substr($hash, 16, 4) .
      '-' .
      substr($hash, 20, 12);
    return $guid;
}

?>
