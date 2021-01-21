<?php
//session_start();
//proceed
$username = $_SESSION['username'];
    if(isset($_GET['ID'])){
        $projectID = mysqli_real_escape_string($con, $_GET['ID']);
        $get_project_data_query = "SELECT * FROM ".$username." WHERE id= '$projectID'";
        $result = mysqli_query($con, $get_project_data_query);
        $project = mysqli_fetch_array($result);
        if (!isset($project)){
            echo "<h1>No such project exists...</h1>";
        }
        else{
            $projectTitle = $project['title'];
            $projectTable = md5($username.$projectTitle);
            $_SESSION['projectTable'] = $projectTable;
            $_SESSION['project'] = $_GET['ID'];
            $get_bugs_query = "SELECT * FROM ".$projectTable;
            $results = mysqli_query($con, $get_bugs_query);
            echo"
                <!-- Jumbotron -->
                <div class='container' id='table-container'>
                    <div class='jumbotron text-center' id='table-host'>
                        <h2 align='left'>Tracked bugs for ".$projectTitle.": 
                            <button class='btn btn-primary' name='project-submit-button' data-toggle='modal' data-target='#add-bug-modal'>Add Bug</button>
                        </h2>";
            if (mysqli_num_rows($results)){  
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
                while($bug = mysqli_fetch_array($results)){        
                echo "<tbody>
                            <tr>
                                <td style=\"text-align: center\">".$bug['bugid']."</td>
                                <td style=\"text-align: center\">".$bug['priority']."</td>
                                <td style=\"text-align: left\">".$bug['description']."</td>
                                <td><a class='btn btn-danger' href='delete.php?ID={$bug['bugid']}'><i class='fa fa-remove' aria-hidden='true'></i></a></td>
                            </tr>
                    </tbody>";
                }
                echo "</table>";
            }
            else{
                echo"<br>";
                echo "<h4>There are no bugs being tracked for this project...</h4>";
            }
        }
    }
?>