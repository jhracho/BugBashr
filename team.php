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
  <link rel="stylesheet" href="CSS/team.css">
  <link rel="shortcut icon" type="image/x-icon" href="srcs/favicon.ico" />

</head>
<body style="background-color:steelblue">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span
          class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand">BugBashr</a></div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="home">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php include('scripts/notification.php') ?>
        <li><a name="logout-button" method="get" href="logout">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Footer area <script src="scripts/home.js"></script> -->
  <footer class="footer">
    <div class="container">
      <b>© 2021 Jake Hracho</b>
    </div>
  </footer>

  <!-- Javascript includes -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>