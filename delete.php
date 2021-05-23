<?php include('connect.php') ?>
<?php

session_start();
$username     = $_SESSION['username'];
$projectTable = $_SESSION['projectTable'];
$project      = $_SESSION['project'];

if (isset($_GET['ID'])){
    $bugID = $_GET['ID'];
    
}
else{
    echo "Cannot access this page";
}

?>