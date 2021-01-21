<?php include('connect.php') ?>
<?php

session_start();
$username = $_SESSION['username'];

// ADDING PROJECTS
if (isset($_POST['project-submit-button'])){
    $projectTitle    = mysqli_real_escape_string($con, $_POST['title-input']);
    $projDescription = mysqli_real_escape_string($con, $_POST['description-input']);
    $projDeadline    = mysqli_real_escape_string($con, $_POST['deadline-input']);
    $startDate       = date("m/d/Y");

    // PREVENT SQL INJECTION
    if (strcmp($projectTitle, "*") == 0){
        echo"<script>alert(\"Invalid project name... no SQL injections allowed ;)\")</script>";
        header("Refresh: 0; url='header.php");
    }
    else{
        $search_preexisting_query = "SELECT * FROM ".$username." WHERE title='$projectTitle' LIMIT 1";
        $results = mysqli_query($con, $search_preexisting_query);
        if (mysqli_num_rows($results)){
            echo"<script>alert(\"A project with that name already exists. Please rename your project.\")</script>";
        }
        else{
            $add_project_query = "INSERT INTO ".$username." (title, bugs, orig, deadline, description) VALUES ('$projectTitle', 0, '$startDate', '$projDeadline', '$projDescription')";
            $projectTable = md5($username.$projectTitle);
            $create_table_query = "CREATE TABLE ".$projectTable." (
                bugid INT AUTO_INCREMENT NOT NULL PRIMARY KEY, 
                description TEXT(250),
                priority INT(5))";
            if(mysqli_query($con, $add_project_query) && mysqli_query($con, $create_table_query)){
                //echo"<script>alert(\"Project added!\")</script>";
                header("Refresh: 0; url='home.php");
            }
            else{
                echo"<script>alert(\"Error adding project, please try again: ".mysqli_error($con)."\")</script>";
                header("Refresh: 0; url='home.php");
            }
        }
    }
}

// REMOVING PROJECTS
if (isset($_POST['project-delete-button'])){
    $projectTitle = mysqli_real_escape_string($con, $_POST['project-select']);
    $delete_project_query = "DELETE FROM ".$username." WHERE title='$projectTitle'";
    $projectTable = md5($username.$projectTitle);
    $delete_project_table_query = "DROP TABLE ".$projectTable;
    if (mysqli_query($con, $delete_project_query) && mysqli_query($con, $delete_project_table_query)){
        //echo"<script>alert(\"Project deleted!\")</script>";
    }
    else{
        echo"<script>alert(\"Error adding project, please try again: ".mysqli_error($con)."\")</script>";
    }
}
?>