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
         
        }
    }
}

// REMOVING PROJECTS
if (isset($_POST['project-delete-button'])){
    
}
?>