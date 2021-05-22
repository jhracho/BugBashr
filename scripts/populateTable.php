<?php //include('connect.php') ?>

<?php

$get_projects = mysqli_prepare($con, "SELECT project_id, project_name, total_bugs, due_date FROM projects WHERE user_id = ?");
mysqli_stmt_bind_param($get_projects, "i", $user_id);
mysqli_stmt_execute($get_projects);
mysqli_stmt_bind_result($get_projects, $project_name, $total_bugs, $due_date);
mysqli_stmt_store_result($get_projects);
$pCount = mysqli_stmt_num_rows($get_projects)

// IF A USER HAS PROJECTS...
if($pCount > 0){
    echo "<table class=\"table table-striped\">
            <thead>
                <tr>
                    <th style=\"text-align: center\">Project Title</th>
                    <th style=\"text-align: center\">Tracked Bugs</th>
                    <th style=\"text-align: center\">Deadline</th>
                </tr>
            </thead>";
    while(mysqli_stmt_fetch($get_projects)){ 
      $modal_name = $project_id."-modal";        
      echo "<tbody>
                <tr>
                    <td style=\"text-align: center\"><a role='button' data-toggle=\"modal\" data-target=\"#".$modal_name."\">".$project_title."</td>
                    <td style=\"text-align: center\"><img src='srcs/bug-icon.png' border=3 height=16 width=16></img>"."  ".$total_bugs."</td>
                    <td style=\"text-align: center\">".$due_date."</td>
                </tr>
            </tbody>";
    }
    echo "</table>";
}

// IF A USER HAS NO PROJECTS...
else{
    echo"<br>";
    echo "<h4>You currently have no projects in progress...</h4>";
}
mysqli_stmt_close($get_projects);
?>