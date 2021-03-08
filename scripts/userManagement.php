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
        $search_preexisting_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $result = mysqli_query($con, $search_preexisting_query);
        if(mysqli_num_rows($result)){
            echo"<script>alert(\"An account with that username already exists...\")</script>";
            header("Refresh: 0; url='../signup");
        }
        else{
            $password = md5($password1);
            $add_user_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            mysqli_query($con, $add_user_query);
            $_SESSION['username'] = $username;
            $_SESSION['projects'] = array();
            $_SESSION['success'] = "You are now logged in";
    
            // Creates project table for that user
            $create_table_query = "CREATE TABLE ".$username." (
                id INT AUTO_INCREMENT NOT NULL PRIMARY KEY, 
                title VARCHAR(255), 
                bugs INT(255), 
                orig VARCHAR(255), 
                deadline VARCHAR(255),
                description TEXT(1000))";
    
            // Redirecting
            if(mysqli_query($con, $create_table_query)){
                header('location: ../home');
            }
            else{
                echo "Error creating user database... sign-up again: ".mysqli_error($con);
                $undo_signup_query = "DELETE FROM users WHERE username='$username'";
                if (!mysqli_query($con, $undo_signup_query)){
                    echo "FATAL ERROR!! Restart the webpage and contact the webmaster!!";
                }
            } 
        } 
    } 
}

// LOG-IN USER
if(isset($_POST['login-button'])){
    
    // Generate Query
    $validate_query = mysqli_prepare($con, "SELECT count(*) as valid FROM users WHERE username = ? AND password = md5(?)");
    mysqli_stmt_bind_param($validate_query, "ss", $_POST['username-input'], $_POST['password-input']);

    /*
    // Get values from HTML form
    $username  = mysqli_real_escape_string($con, $_POST['username-input']);
    $password1 = mysqli_real_escape_string($con, $_POST['password-input']);
    $password = md5($password1);
    */
    // password(?)

    // Authenticate User
    mysqli_stmt_execute($validate_query);
    mysqli_stmt_bind_result($validate_query, $valid);
    mysqli_stmt_fetch($validate_query);

    if ($valid > 0){
        $_SESSION['username'] = $_POST['username-input'];
        $_SESSION['projects'] = array();
        $_SESSION['projectTable'] = "";
        header('location: ../home');
    }

    /*
    // Check for validation
    if(mysqli_num_rows($results)){
        $_SESSION['username'] = $username;
        $_SESSION['projects'] = array();
        $_SESSION['projectTable'] = "";
        header('location: ../home');
    }
    */
    
    else{
        echo"<script>alert(\"Invalid username and/or password\")</script>";
        header("Refresh: 0; url='../login");
    }
}

?>