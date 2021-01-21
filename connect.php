<?php

us-cdbr-east-03.cleardb.com
/heroku_2147788ee763750?reconnect=true

$dbhost = "bugbashrds.cbfcz2cbr5g8.us-east-1.rds.amazonaws.com";
$dbuser = "b0d7a671f1862a";
$dbpswd = "fca5c476";
$db     = "heroku_2147788ee763750";

/*
$dbhost = $_SERVER['RDS_HOSTNAME'];
$dbuser = $_SERVER['RDS_USERNAME'];
$dbpswd = $_SERVER['RDS_PASSWORD'];
$db     = $_SERVER['RDS_DB_NAME'];
$dbport = $_SERVER['RDS_PORT']
*/

/*
$dbhost = "localhost";
$dbuser = "root";
$dbpswd = "";
$db     = "user-data";
*/
$con = mysqli_connect($dbhost, $dbuser, $dbpswd, $db);
if (!$con){
    die("Connection failed: ".mysqli_connect_error());
}

?>

