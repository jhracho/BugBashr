<?php include('connect.php') ?>

<?php

session_start();
$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$project_id = $_GET['ID'];

// PHP FOR ADDING BUG
if (isset($_POST['bug-submit-button'])){
    $bug_description = mysqli_real_escape_string($con, $_POST['description-input']);   
    $priority = substr(mysqli_real_escape_string($con, $_POST['priority-input']), 0, 1);

    $add_bug = mysqli_prepare($con, "INSERT INTO bugs VALUES (NULL, ?, ?, ?)");
    mysqli_stmt_bind_param($add_bug, "iis", $project_id, $priority, $bug_description);
    mysqli_stmt_execute($add_bug);
    mysqli_stmt_close($add_bug);

    $update_project = mysqli_prepare($con, "UPDATE projects SET total_bugs = total_bugs+1 WHERE project_id = ?");
    mysqli_stmt_bind_param($update_project, "i", $project_id);
    mysqli_stmt_execute($update_project);
    mysqli_stmt_close($update_project);
}

?>