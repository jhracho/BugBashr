<?php


$url = parse_url("mysql://b0d7a671f1862a:fca5c476@us-cdbr-east-03.cleardb.com/heroku_2147788ee763750?reconnect=true");
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$con = mysqli_connect($server, $username, $password, $db);
if (!$con){
    die("Connection failed: ".mysqli_connect_error());
}

?>

