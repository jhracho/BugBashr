<?php


$dbhost = "bugbashrds.cbfcz2cbr5g8.us-east-1.rds.amazonaws.com";
$dbuser = "admin";
$dbpswd = "bugbashr";
$db     = "user_data";

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

