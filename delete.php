<?php include('connect.php') ?>
<?php

session_start();
$username     = $_SESSION['username'];
$user_id      = $_SESSION['user_id'];
$has_access   = True;

if (isset($_GET['ID'])){
    // Get the users assigned to the project
    $bug_id = $_GET['ID'];
    $check_access = mysqli_prepare($con, "SELECT has_access FROM bugs, projects WHERE bugs.project_id = projects.project_id AND bug_id = ?");
    mysqli_stmt_bind_param($check_access, "i", $bug_id);
    mysqli_stmt_execute($check_access);
    mysqli_stmt_bind_result($check_access, $has_access);
    mysqli_stmt_fetch($check_access);
    mysqli_stmt_close($check_access);

    // Check if the user has access to the project
    $found = strpos($has_access, $bug_id);

    // Interpret the result
    if ($found !== false){
        $delete_bug = mysqli_prepare($con, 'DELETE FROM bugs WHERE bug_id = ?');
        mysqli_stmt_bind_param($delete_bug, "i", $bug_id);
        mysqli_stmt_execute($delete_bug);
        mysqli_stmt_close($delete_bug);
    }
    else{
        echo "Cannot access this page";
    }
}
else{
    echo "Cannot access this page";
}

?>