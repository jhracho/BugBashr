<?php include('connect.php') ?>
<?php

$get_project = mysqli_prepare($con, "SELECT project_name FROM projects WHERE project_id = ?");
mysqli_stmt_bind_param($get_project, "i", $project_id);
mysqli_stmt_execute($get_project);
mysqli_stmt_bind_result($get_project, $project_name);
mysqli_stmt_fetch($get_project);
mysqli_stmt_close($get_project);
echo"<!-- Jumbotron -->
<div class='container' id='table-container'>
    <div class='jumbotron text-center' id='table-host'>
        <h2 align='left'>Tracked bugs for ".$project_name.": 
            <button class='btn btn-primary' name='project-submit-button' data-toggle='modal' data-target='#add-bug-modal'>Add Bug</button>
        </h2>  ";

$username = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
    if(isset($_GET['ID'])){
        $project_id = mysqli_real_escape_string($con, $_GET['ID']);

        $get_bugs = mysqli_prepare($con, "SELECT bug_id, priority, bug_desc FROM bugs WHERE project_id = ?");
        mysqli_stmt_bind_param($get_bugs, "i", $project_id);
        mysqli_stmt_execute($get_bugs);
        mysqli_stmt_bind_result($get_bugs, $bug_id, $bug_priority, $bug_desc);
        mysqli_stmt_store_result($get_bugs);
        $bCount = mysqli_stmt_num_rows($get_bugs);
       
        if ($bCount == 0){
            echo "<h3>There are no bugs tracked for this project...</h3>";
        }
        else{
            echo"   
                        <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th style=\"text-align: center\">ID</th>
                                <th style=\"text-align: center\">Priority</th>
                                <th style=\"text-align: left\">Description</th>
                                <th style=\"text-align: left\"></th>
                            </tr>
                        </thead>";
                while(mysqli_stmt_fetch($get_bugs)){        
                echo "<tbody>
                            <tr>
                                <td style=\"text-align: center\">".$bug_id."</td>
                                <td style=\"text-align: center\">".$bug_priority."</td>
                                <td style=\"text-align: left\">".$bug_desc."</td>
                                <td><a class='btn btn-danger' href='delete.php?ID={$bug_id}'><i class='fa fa-remove' aria-hidden='true'></i></a></td>
                            </tr>
                    </tbody>";
                }
                echo "</table>";
        }
        mysqli_stmt_close($get_bugs);
    }

?>