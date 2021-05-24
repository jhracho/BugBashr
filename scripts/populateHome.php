<?php include('connect.php') ?>
<?php
// DYNAMICALLY ADD MODALS
    $user_id = $_SESSION['user_id'];
    $get_projects = mysqli_prepare($con, "SELECT project_id, project_name, project_desc, creation_date, total_bugs FROM projects WHERE user_id = ?");
    mysqli_stmt_bind_param($get_projects, "i", $user_id);
    mysqli_stmt_execute($get_projects);
    mysqli_stmt_bind_result($get_projects, $project_id, $project_name, $project_desc, $created_at, $total_bugs);
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
                    <p><strong>Date Added:</strong></p>
                    <p>".$created_at."</p>
                    <p><strong>Tracked Bugs: </strong>".$total_bugs."</p>
                </div>
                <div class='modal-footer'>
                    <a class='btn btn-primary' href='details?ID=".$project_id."'>View/Manage Bugs</a>
                    <a class='btn btn-primary' href='team?ID=".$project_id."'>Manage Team</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->";
    }
    mysqli_stmt_close($get_projects);
?>