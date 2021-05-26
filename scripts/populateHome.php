<?php include('connect.php') ?>
<?php
// DYNAMICALLY ADD PROJECT MODALS
    $user_id = $_SESSION['user_id'];
    $get_projects = mysqli_prepare($con, "SELECT projects.user_id, first_name, last_name, project_id, project_name, project_desc, creation_date, total_bugs FROM users, projects WHERE projects.user_id = users.user_id AND projects.has_access LIKE ?;");
    $helper = '%'.$user_id.'%';
    mysqli_stmt_bind_param($get_projects, "s", $helper);
    mysqli_stmt_execute($get_projects);
    mysqli_stmt_bind_result($get_projects, $project_user_id, $first_name, $last_name, $project_id, $project_name, $project_desc, $created_at, $total_bugs);
    while(mysqli_stmt_fetch($get_projects)){
        $modal_name = "".$project_id."-modal";
        echo"<div class='modal fade' tabindex='-1' role='dialog' id='".$modal_name."'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button>
                    <h4 class='modal-title'>".$project_name."</h4>
                </div>
                <div class='modal-body'>
                    <p><strong>Description:</strong></p>
                    <p>".$project_desc."</p>
                    <p><strong>Project Manager:</strong></p>
                    <p>{$first_name} {$last_name}</p>
                    <p><strong>Date Added:</strong></p>
                    <p>".$created_at."</p>
                    <p><strong>Tracked Bugs: </strong>".$total_bugs."</p>
                </div>
                <div class='modal-footer'>
                    <a class='btn btn-primary' href='details?ID=".$project_id."'>View/Manage Bugs</a>";
                    if ($user_id === $project_user_id){
                        echo "<a class='btn btn-primary' href='teamAuth?ID=".$project_id."'>Manage Team</a>";
                    }
                    else{
                        echo "<a class='btn btn-primary' href='teamAuth?ID=".$project_id."'>View Team</a>";
                    }
                echo "</div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->";
    }
    mysqli_stmt_close($get_projects);
?>