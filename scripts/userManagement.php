<?php include('../connect.php') ?>
<?php

// PORT 3306
session_start();
$username = "";
$password = "";

// SIGN-UP USER
if(isset($_POST['signup-submit-button'])){
    
    // Gets values from HTML form
    $username  = mysqli_real_escape_string($con, $_POST['username-input']);
    $password1 = mysqli_real_escape_string($con, $_POST['password-input1']);
    $password2 = mysqli_real_escape_string($con, $_POST['password-input2']);

    // Error checking
    if (empty($username)){
        echo"<script>alert(\"Username cannot be left blank!\")</script>";
        header("Refresh: 0; url='../signup");
    }
    elseif (empty($password1) || empty($password2)){
        echo"<script>alert(\"Password cannot be left blank!\")</script>";
        header("Refresh: 0; url='../signup");
    }
    
    elseif(strlen($password1) <= 8 || strlen($password2) <= 8){
        echo"<script>alert(\"Password must be between 8-15 characters!\")</script>";
        header("Refresh: 0; url='../signup"); 
    }

    elseif ($password1 !== $password2) {
        echo"<script>alert(\"Passwords don't match!\")</script>";
        header("Refresh: 0; url='../signup");
    }

    else{
        // Adds user to database
        $search_preexisting_query = mysqli_prepare($con, "SELECT count(*) as valid FROM users WHERE username = ?");
        mysqli_stmt_bind_param($search_preexisting_query, "s", $username);
        mysqli_stmt_execute($search_preexisting_query);
        mysqli_stmt_bind_result($search_preexisting_query, $valid);
        mysqli_stmt_fetch($search_preexisting_query);

        if($valid > 0){
            echo"<script>alert(\"An account with that username already exists...\")</script>";
            header("Refresh: 0; url='../signup");
        }
        else{
            // Prepare and send add_user_query
            $add_user_query = mysqli_prepare($con, "INSERT INTO users (username, password) VALUES (?,md5(?))");
            mysqli_stmt_bind_param($add_user_query, "ss", $username, $password);
            mysqli_stmt_execute($add_user_query);
            $_SESSION['username'] = $username;
            header('location: ../home');
        } 
    } 
}

// LOG-IN USER
if(isset($_POST['login-button'])){
    
    // Generate Query
    $validate_query = mysqli_prepare($con, "SELECT user_id FROM users WHERE username = ? AND password = md5(?)");
    mysqli_stmt_bind_param($validate_query, "ss", $_POST['username-input'], $_POST['password-input']);

    // Run Query
    mysqli_stmt_execute($validate_query);
    mysqli_stmt_bind_result($validate_query, $user_id);
    mysqli_stmt_fetch($validate_query);

    // Authenticate
    if ($user_id > 0){
        $_SESSION['username'] = $_POST['username-input'];
        $_SESSION['user_id'] = $user_id;
        header('location: ../home');
    }
   
    else{
        echo"<script>alert(\"Invalid username and/or password\")</script>";
        header("Refresh: 0; url='../login");
    }
}

?>