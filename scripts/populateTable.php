<?php //include('connect.php') ?>

<?php

$grab_user_projects_query = "SELECT * FROM ".$username;
$results  = mysqli_query($con, $grab_user_projects_query);


// IF A USER HAS PROJECTS...
if(mysqli_num_rows($results)){
    $projects = array();
    echo "<table class=\"table table-striped\">
            <thead>
                <tr>
                    <th style=\"text-align: center\">Project Title</th>
                    <th style=\"text-align: center\">Tracked Bugs</th>
                    <th style=\"text-align: center\">Deadline</th>
                </tr>
            </thead>";
    while($project = mysqli_fetch_array($results)){ 
      array_push($projects, $project);
      $modal_name = $project['id']."-modal";        
      echo "<tbody>
                <tr>
                    <td style=\"text-align: center\"><a role='button' data-toggle=\"modal\" data-target=\"#".$modal_name."\">".$project['title']."</td>
                    <td style=\"text-align: center\"><img src='srcs/bug-icon.png' border=3 height=16 width=16></img>"."  ".$project['bugs']."</td>
                    <td style=\"text-align: center\">".$project['deadline']."</td>
                </tr>
            </tbody>";
    }
    echo "</table>";
    $_SESSION['projects'] = $projects;
}

// IF A USER HAS NO PROJECTS...
else{
    echo"<br>";
    echo "<h4>You currently have no projects in progress...</h4>";
}

?>