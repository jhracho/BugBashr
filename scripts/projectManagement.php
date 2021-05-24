<?php include('connect.php') ?>
<?php

session_start();
$username = $_SESSION['username'];
$user_id  = $_SESSION['user_id'];

// ADDING PROJECTS
if (isset($_POST['project-submit-button'])){
    $projectTitle    = mysqli_real_escape_string($con, $_POST['title-input']);
    $projDescription = mysqli_real_escape_string($con, $_POST['description-input']);
    $projDeadline    = mysqli_real_escape_string($con, $_POST['deadline-input']);

    // Check if a project name already exists
    $search_preexisting = mysqli_prepare($con, "SELECT count(project_name) FROM projects where project_name = ? AND user_id = ?");
    mysqli_stmt_bind_param($search_preexisting, "si", $projectTitle, $user_id);
    mysqli_stmt_execute($search_preexisting);
    mysqli_stmt_bind_result($search_preexisting, $pCount);
    mysqli_stmt_fetch($search_preexisting);
    mysqli_stmt_close($search_preexisting);
    if ($pCount > 0){
        echo"<script>alert(\"A project with that name already exists. Please rename your project.\")</script>";
    }
    else{
        $add_project = mysqli_prepare($con, "INSERT INTO projects VALUES (NULL, ?, ?, ?, CURDATE(), ?, 0, ?)");
        mysqli_stmt_bind_param($add_project, "issss", $user_id, $projectTitle, $projDescription, $projDeadline, $user_id);
        mysqli_stmt_execute($add_project);
        mysqli_stmt_close($add_project);        
    }
}

// REMOVING PROJECT
if (isset($_POST['project-delete-button'])){
    $project_name = mysqli_real_escape_string($con, $_POST['project-select']);
    $retrieve_id = mysqli_prepare($con, "SELECT project_id FROM projects WHERE project_name = ?");
    mysqli_stmt_bind_param($retrieve_id, "s", $project_name);
    mysqli_stmt_execute($retrieve_id);
    mysqli_stmt_bind_result($retrieve_id, $project_id);
    mysqli_stmt_fetch($retrieve_id);
    mysqli_stmt_close($retrieve_id);

    $delete_project = mysqli_prepare($con, "DELETE FROM projects WHERE project_name = ?");
    mysqli_stmt_bind_param($delete_project, "s", $project_name);
    mysqli_stmt_execute($delete_project);
    mysqli_stmt_close($delete_project);

    $delete_bugs = mysqli_prepare($con, "DELETE FROM bugs WHERE project_id = ?");
    mysqli_stmt_bind_param($delete_bugs, "i", $project_id);
    mysqli_stmt_execute($delete_bugs);
    mysqli_stmt_close($delete_bugs);
}
?>