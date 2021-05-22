<?php include('connect.php') ?>
<?php
    $user_id = $SESSION['user_id'] = $user_id;
    $get_projects = mysqli_prepare($con, "SELECT project_name FROM projects WHERE user_id = ?");
    mysqli_stmt_bind_param($get_projects, "i", $user_id);
    mysqli_stmt_execute($get_projects);
    mysqli_stmt_bind_result($get_projects, $project_name);
    while (mysqli_stmt_fetch($get_projects)){
        echo"<option>{$project_name}</option>";
    }
    mysqli_stmt_close($get_projects);
?>