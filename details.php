<?php //include('scripts/connect.php') ?>
<?php include('scripts/bugManagement.php')?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Project Details</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Link to your local style overrides -->
  <link rel="stylesheet" href="CSS/details.css">
  <link rel="shortcut icon" type="image/x-icon" href="srcs/favicon.ico" />

</head>

<body style="background-color:steelblue">

    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span
            class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand">BugBashr</a></div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a data-toggle="modal" data-target="#add-bug-modal">Add Bug</a></li>
            <li><a href="home.php">Return Home<span class="sr-only">(current)</span></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a name="logout-button" method="get" href="index.php?logout='1'">Logout</a></li>
        </ul>
        </div>
    </div>
    </nav>

    <?php include('scripts/populateDetails.php') ?>
    </div>
</div>

<!-- Add bug modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="add-bug-modal">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Add Bug:</h4>
         </div>
         <div class="modal-body">
            <form class="bsr-form " method="post">
              <div class="form-group">
                <label for="checkboxes">Bug Description (Limit 100 Characters)</label>
                <textarea maxlength="100" id="description-input" name="description-input" class="form-control" rows="3"></textarea>
                <div style='text-align:right' id='charactersRemaining'>Characters Remaining: 100</div>
              </div>
              
              <div class="form-group">
                <label for="checkboxes">Priority:</label>
                <select class="form-control" name="priority-input">
                    <option>1 (Least)</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5 (Greatest)</option>
                </select>
              </div>

              <button type="reset" class="btn btn-default" id="bsr-clear-button">Clear</button>
              <button type="submit" class="btn btn-primary" name="bug-submit-button">Submit</button>
            </form>
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Footer area <script src="../scripts/home.js"></script> -->
<footer class="footer">
    <div class="container">
    <b>© 2021 Jake Hracho</b>
    </div>
</footer>

<!-- Javascript includes -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="scripts/characterCount.js"></script>    
</body>
</html>