<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$con = mysqli_connect($server, $username, $password, $db);
if (!$con){
    die("Connection failed: ".mysqli_connect_error());
}

?>

