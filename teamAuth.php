<?php include('connect.php') ?>
<?php
    if (isset($_GET['ID'])){
        // Get the users assigned to the project
        $project_id = $_GET['ID'];
        $user_id = $_SESSION['user_id'];
        $check_access = mysqli_prepare($con, "SELECT user_id FROM projects WHERE project_id = ?");
        mysqli_stmt_bind_param($check_access, "i", $project_id);
        mysqli_stmt_execute($check_access);
        mysqli_stmt_bind_result($check_access, $has_access);
        mysqli_stmt_fetch($check_access);
        mysqli_stmt_close($check_access);

        // Check if the user has access to the project
        if ($user_id === $has_access){
            <?php include('team.php') ?>
        }
        else{
            header('location: home');
        }
    }
    else{
        header('location: home');
    }
?>