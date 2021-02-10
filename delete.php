<?php include('connect.php') ?>
<?php

session_start();
$username     = $_SESSION['username'];
$projectTable = $_SESSION['projectTable'];
$project      = $_SESSION['project'];

if (isset($_GET['ID'])){
    $bugID = $_GET['ID'];
    $delete_bug_query = "DELETE FROM ".$projectTable." WHERE bugid='$bugID'";
    if (mysqli_query($con, $delete_bug_query)){
        $update_bugcount_query = "UPDATE ".$username." SET bugs=bugs-1 WHERE id={$project}";
        mysqli_query($con, $update_bugcount_query);
        header("location: details.php?ID={$project}");  
    }
    else{
        echo "Error deleting bug: ".mysqli_error($con);
    }
}
else{
    echo "Cannot access this page";
}

?>