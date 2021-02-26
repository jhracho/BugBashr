<?php include('scripts/projectManagement.php') ?>

<?php

$username = $_SESSION['username'];

/*
// PREVENT NON-LOGGED IN USERS FROM ACCESSING HOME PAGE
if (empty($username)){
  $_SESSION['msg'] = "You must log in to view this page!";
  header("location: login");
}
*/

// LOG-OUT USER
if (isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['username']);
  header("location: index");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Home Page</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Link to your local style overrides -->
  <link rel="stylesheet" href="CSS/home.css">
  <link rel="shortcut icon" type="image/x-icon" href="srcs/favicon.ico" />

</head>
<body style="background-color:steelblue">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span
          class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand">BugBashr</a></div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a>Home<span class="sr-only">(current)</span></a></li>
        <li><a data-toggle="modal" data-target="#add-project-modal">Add Project</a></li>
        <li><a data-toggle="modal" data-target="#remove-project-modal">Remove Project</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a name="logout-button" method="get" href="index?logout='1'">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Jumbotron -->
<div class="container" id="table-container">
  <div class="jumbotron text-center" id="table-host">
    <h2 align="left"><?php echo $username; ?>'s Projects:</h2>
    
    <!--- PHP To Get User Projects --->
    <?php include('scripts/populateTable.php') ?>
  </div>
</div>

<!-- Add project modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="add-project-modal">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Add Project:</h4>
         </div>
         <div class="modal-body">
            <form class="bsr-form " method="post">
              <div class="form-group">
                <label for="tex-input">Project Title</label>
                <input name="title-input" type="text" class="form-control" id="input-text-6850203">
              </div>
              <div class="form-group">
                <label for="checkboxes">Project Description (Limit 200 Characters)</label>
                <textarea maxlength="200" id='description-input' name="description-input" class="form-control" rows="5"></textarea>
              </div>
              <div style='text-align:right' id='charactersRemaining'>Characters Remaining: 200</div>
              <div class="form-group">
                <label for="tex-input">Deadline (Enter in format MM/DD/YYYY):</label>
                <input name="deadline-input" type="text" class="form-control" id="input-text-6850203">
              </div>
              <button type="reset" class="btn btn-default" id="bsr-clear-button">Clear</button>
              <button type="submit" class="btn btn-primary" name="project-submit-button">Submit</button>
            </form>
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Remove project modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="remove-project-modal">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Which project would you like to delete?</h4>
         </div>
         <div class="modal-body">
         <form class="bsr-form " method="post" action="home.php">
            <div class="form-group">
              <label for="checkboxes"></label>
              <select class="form-control" name="project-select">
                <?php
                  foreach ($_SESSION['projects'] as $project){
                    echo"<option>".$project['title']."</option>";
                  }
                ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary" name="project-delete-button">Delete</button>
          </form>
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
// DYNAMICALLY ADD MODALS
    foreach($_SESSION['projects'] as $project){
        $modal_name = "".$project['id']."-modal";
        echo"<div class='modal fade' tabindex='-1' role='dialog' id='".$modal_name."'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button>
                    <h4 class='modal-title'>".$project['title']."</h4>
                </div>
                <div class='modal-body'>
                    <p><strong>Description:</strong></p>
                    <p>".$project['description']."</p>
                    <p><strong>Date Added:</strong></p>
                    <p>".$project['orig']."</p>
                    <p><strong>Tracked Bugs: </strong>".$project['bugs']."</p>
                </div>
                <div class='modal-footer'>
                    <a class='btn btn-primary' href='details?ID=".$project['id']."'>View/Manage Bugs</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->";
    }
?>

<!-- Footer area <script src="scripts/home.js"></script> -->
  <footer class="footer">
    <div class="container">
      <b>© 2021 Jake Hracho</b>
    </div>
  </footer>

  <!-- Javascript includes -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="scripts/characterCount2.js"></script>
</body>

</html>