<?php include('connect.php') ?>

<?php

session_start();
$username = $_SESSION['username'];
$projectTable = $_SESSION['projectTable'];

// PHP FOR ADDING BUG
if (isset($_POST['bug-submit-button'])){
    $bug_description = mysqli_real_escape_string($con, $_POST['description-input']);   
    $priority = substr(mysqli_real_escape_string($con, $_POST['priority-input']), 0, 1);

    $add_bug_query = "INSERT INTO ".$projectTable." (description, priority) VALUES ('$bug_description', '$priority')";
    $update_bugcount_query = "UPDATE ".$username." SET bugs=bugs+1 WHERE id={$_GET['ID']}";
    if (mysqli_query($con, $add_bug_query)){  
        if (!mysqli_query($con, $update_bugcount_query)){
            echo "Error adding bug, please try again... ".mysqli_error($con);
            $delete_bug_query = "DELETE FROM ".$projectTable." WHERE description='$description'";
            mysqli_query($con, $delete_bug_query);
        }
    }
    else{
        echo "Error adding bug, please try again... ".mysqli_error($con);
    }

}

?>