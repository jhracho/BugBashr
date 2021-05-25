<?php include('connect.php') ?>
<?php

    $user_id = $_SESSION['user_id'];
    $check_notif = mysqli_prepare($con, "SELECT messages FROM users WHERE user_id = ?");
    mysqli_stmt_bind_param($check_notif, "i", $user_id);
    mysqli_stmt_execute($check_notif);
    mysqli_stmt_bind_result($check_notif, $msg);
    mysqli_stmt_fetch($check_notif);
    mysqli_stmt_close($check_notif);

    if ($msg == 0){
        echo "<li><a name='mail-button' method='get' href='inbox'><i class='fa fa-envelope' aria-hidden='true'></i></a></li>";
    }
    else{
        echo" <span class='dot'></span>";
        echo "<li><a name='mail-button' method='get' href='inbox'><i class='fa fa-envelope' aria-hidden='true' style='color:white'></i></a></li>";
    }

?>